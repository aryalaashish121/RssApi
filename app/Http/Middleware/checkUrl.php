<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class checkUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $path = $request->path();
        $pathLowercase = strtolower($path);
        if ($path !== $pathLowercase) {
            Log::channel('apilog')->warning("User try to hit with invaild url ->" . $path);
            return response()->json([
                "error" => "Url Can only be in lower case!"
            ], 406);
        }
        if(preg_match('/[^\s\p{Pd}a-zA-ZÀ-ÿ]/', $path)){
            return response()->json([
                "error"=>"Invalid url! only lower case and hyphens accepted in url"
            ],406);
        }
        return $next($request);
    }
}
