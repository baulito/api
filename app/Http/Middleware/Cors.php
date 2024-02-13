<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            //header("Access-Control-Allow-Origin", "*");
            $headers = [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, HEAD, POST, PUT, DELETE, CONNECT, OPTIONS, TRACE, PATCH',
                'Access-Control-Allow-Headers' => 'Origin, Content-Type, X-Auth-Token, Accept, Authorization',
            ];
            if( $request->getMethod() == "OPTIONS") {
                return response()->json('OK', 200, $headers);
            }
            $response = $next( $request);
            foreach ($headers as $key => $value){
                $response->header($key, $value);
            }
        return $response;
    }
}
