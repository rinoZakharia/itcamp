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
                    // next with success
                    if(User::isPayed()){
                        session()->put('check.peserta',true);
                        $request->session()->flash('success', 'Pembayaran telah dikonfirmasi cek informasi peserta !');
                        // return redirect()->route('peserta.information');
                    }
                }
                // check sertifikat is already by email .png
                // if(!session()->get('sertifikat.peserta')) {
                //     // next with success
                //     if(file_exists(public_path('uploads/sertifikat/'.$email.'.png'))){
                //         session()->put('sertifikat.peserta',true);
                //     }
                // }
                if(file_exists(public_path('uploads/sertifikat/'.$email.'.png'))){
                    session()->put('sertifikat.peserta',true);
                }else{
                    session()->put('sertifikat.peserta',false);
                }
                return $next($request);
            }
        }
        session()->put('url.intended', url()->current());
        return redirect()->route('peserta.login');
    }
}
