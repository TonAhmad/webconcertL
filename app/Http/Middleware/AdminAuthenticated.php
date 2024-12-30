<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info('AdminAuthenticated Middleware Dipanggil.');

        if (!session()->has('admin')) {
            return redirect()->route('admin.login')->with('error', 'Please login as admin.');
        }

        return $next($request);
    }

}
