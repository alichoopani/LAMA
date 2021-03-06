<?php

namespace App\Http\Middleware\Admin;

use App\Http\Controllers\LAMA\Handler\Response;
use App\Http\Controllers\LAMA\Objects\AdminDetails;
use Closure;
use Illuminate\Support\Facades\Auth;

class isSetOrgan
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
        if (!session()->has('currentOrganId') || session()->get('currentOrganId') == 0)
            return Response::Handle(false, '', 1, 40030);
        return $next($request);
    }
}
