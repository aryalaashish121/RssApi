<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GuardianApiController extends Controller
{

    public function index(Request $request, $category)
    {
        

        //accepting json request
        $format = $request->format;
        $section = $request->section;

        $data = $this->getData($category, $section);
        return $data;
    }

    protected function getData($category, $section)
    {
        $cachedData = Cache::get($category);
        if (!isset($cachedData)) {

            $response = Http::get('https://content.guardianapis.com/' . $category, [
                'api-key' => config('app.api_key'),
                'q' => $section,
            ]);
            Cache::add($category, json_decode($response, true), 600);
        }
        return Cache::get($category);;
    }
}
