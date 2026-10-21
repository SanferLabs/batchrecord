<?php

namespace App\Http\Middleware;

use App\Models\BatchUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureBatchUserRegistered
{
    public function handle(Request $request, Closure $next): Response
    {
        $authUser = Auth::user();
        $emailLower = strtolower(trim((string) ($authUser->email ?? '')));

        if (BatchUser::count() === 0) {
            BatchUser::create([
                'name'         => 'chatboteams',
                'email'        => 'chatboteams@sanfer.com.mx',
                'role'         => 'Administrador',
                'is_protected' => true,
            ]);

            BatchUser::create([
                'name'         => 'Brenda Campos Valadez',
                'email'        => 'brenda.campos@sanfer.com.mx',
                'role'         => 'Administrador',
                'is_protected' => false,
            ]);
        }

        if ($emailLower === '' || !BatchUser::whereRaw('LOWER(email) = ?', [$emailLower])->exists()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->with('error', 'Acceso restringido: Tu usuario no está dado de alta por un Administrador.');
        }

        return $next($request);
    }
}
