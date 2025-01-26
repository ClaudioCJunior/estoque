<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class HandlerApiAuth extends Middleware
{
    protected function redirectTo($request)
    {
        // Retorna 401 se não autenticado
        if (!$request->expectsJson()) {
            abort(401, 'Unauthorized');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        // Verifica se há um usuário autenticado no guard padrão
        if (!auth()->guard('sanctum')->check()) {
            abort(401, 'Unauthorized');
        }

        return $next($request);
    }
}