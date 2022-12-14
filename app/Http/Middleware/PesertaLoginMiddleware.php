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
                // if account is payed

                // to dashboard
                return redirect()->route('peserta.account');
            } else {
                // remove sessuon
                session()->forget('login.peserta');
                session()->forget('email.peserta');
                session()->forget('nama.peserta');
                session()->forget('check.peserta');
            }
        }

        return $next($request);
    }
}
