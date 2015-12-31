<?php

namespace Chamal\DeviceAuthentication\Middleware;

use Closure;
use DeviceAuthentication;
use Response;

class DeviceAuth
{
    public function handle($request, Closure $next) {
        //implemenetation goes here...
        if(DeviceAuthentication::validateToken($request->token)==0)
        {
            //return response('Unauthorized',401);
            return Response::json([
                'result'  => [],
                'error' => 'InvalidAccessToken',
                'status'   => 'ERROR'
            ],401);
        }
        else
        {
            return $next($request);
        }
    }
}