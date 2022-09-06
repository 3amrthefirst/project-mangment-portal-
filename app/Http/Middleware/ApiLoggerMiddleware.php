<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiLoggerMiddleware
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    /**
     * terminate an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  $response
     * @return mixed
     */
    public function terminate($request, $response)
    {
        $headers = [];
        foreach ($request->headers as $key => $header) {
            $headers[$key] = $header[0];
        }
        $logs = [
            'TIME'         => gmdate("F j, Y, g:i a"),
            'IP'           => $request->ip(),
            'URI'          => $request->getUri(),
            'METHOD'       => $request->getMethod(),
            'REQUEST_BODY' => json_encode($request->all()),
            'RESPONSE'     => $response->getContent(),
        ];
        $logs = array_merge($logs, $headers);
        Log::channel("apiDaily")->info(print_r($logs, true));
    }

}
