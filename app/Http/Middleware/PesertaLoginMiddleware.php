<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class PesertaLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if user is not logged in
        if (session()->has('login.peserta')) {
            // get email from session
            $email = session()->get('email.peserta');
            // check account
            $user = User::where('email', $email)->first();
            if ($user) {
                // to dashboard
                return redirect()->route('peserta.dashboard');
            }
        }

        return $next($request);
    }
}
