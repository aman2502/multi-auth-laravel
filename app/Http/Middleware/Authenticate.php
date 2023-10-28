<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (($request->is('admin') || $request->is('admin/*')) ) {
            return 'admin/login';
        }

        if (($request->is('user') || $request->is('user/*')) ) {
            return 'user/login';
        }
    }
}
