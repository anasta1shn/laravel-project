<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            session()->flash('warning', 'У вас нет прав администратора!');
            return redirect(route('index'));
        }

        return $next($request);
    }
}
