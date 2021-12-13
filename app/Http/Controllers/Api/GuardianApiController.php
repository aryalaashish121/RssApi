<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GuardianApiController extends Controller
{

    public function index(Request $request, $category)
    {
        //accepting json request
        $format = $request->format;
        $section = $request->section;
        $data = $this->getData($category, $section);

        if ($data['response']['status'] != "ok") {
            return $this->sendErrorResponse();
        }
        return response()->view('xml', compact('data'))->withHeaders([
            'Content-Type' => 'application/xml',
            'charset' => 'utf-8'
        ]);
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
        return Cache::get($category);
    }

    private function sendErrorResponse()
    {
        return response()->json([
            "status" => "error",
            "message" => "Requested resource not found"
        ], 400);
    }
}
