<?php

namespace Sil2\VfApi\Middleware;

use Closure;
use Illuminate\Support\Str;

class Api
{

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (md5($request->bearerToken()) !== config('vf-api.api_token')) {
            return response('unauthorized', 401);
        }

        //The current day of the week must be added to all responses in an "X-Day" header. This must be implemented using an HTTP middleware
        $response->header('X-Day', (new \DateTime())->format('l'));

        if ($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('patch')) {
            $header = $request->header('Content-type');
            //The API must support input as JSON.
            if (!Str::contains($header, 'application/json')) {
                return response(['message' => 'Only JSON requests are allowed'], 406);
            }
        }

        return $response;
    }
}
