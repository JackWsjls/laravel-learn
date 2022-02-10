<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class Benchmark
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $a, $b)
    {
        // 前置
        $sTime = microtime(true);
        $response = $next($request);
        // 后置
        $runTime = microtime(true) - $sTime;
        Log::info("benchmark", [
            "url" => $request->url(),
            "a"=>$a,
            "b"=>$b,
            "input" => $request->input(),
            "time" => "$runTime ms"
        ]);
        return $response;
    }
}
