<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class PesertaMiddleware
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
                if(!session()->get('check.peserta')) {
                    session()->put('check.peserta', User::isPayed());
                }
                return $next($request);
            }
        }

        return redirect()->route('peserta.login');
    }
}
