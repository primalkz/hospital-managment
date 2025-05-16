<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        
        if (in_array($user->type, $roles)) {
            return $next($request);
        }

        return redirect()
            ->route('dashboard')
            ->with('error', 'You do not have permission to access this page.');
    }
}
