<?php

namespace Laratutor\NovaAgileTestdox\Http\Middleware;

use Laratutor\NovaAgileTestdox\NovaAgileTestdox;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(NovaAgileTestdox::class)->authorize($request) ? $next($request) : abort(403);
    }
}
