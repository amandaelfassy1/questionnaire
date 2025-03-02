<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Vérifier si l'utilisateur est authentifié et possède le bon rôle
        if (!$user || $user->role_name !== $role) {
            abort(403, 'Accès interdit.');
        }

        return $next($request);
    }
}
