<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard($guards)->check()) {
            return $this->auth->shouldUse($guards);
        }

        Log::warning('Unauthenticated access attempt', ['url' => $request->fullUrl()]);

        $this->unauthenticated($request, $guards);
    }

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('welcome');
    }
}
