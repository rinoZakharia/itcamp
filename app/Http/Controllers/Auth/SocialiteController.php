<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class SocialiteController extends Controller
{
     /**
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProvideCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->user();
            return $this->createOrGetUser($user);
        }catch (Exception $e) {
            return redirect()->back();
        }


    }

    public function createOrGetUser($user)
    {
        $peserta =User::find($user->email);
        if($peserta){
            // login
            session(['login.peserta' => true]);
            session(['email.peserta' => $peserta->email]);
            session(['nama.peserta' => $peserta->nama]);
            session(['check.peserta' => User::isPayed()]);
            return redirect()->route('peserta.account');
        }else{
            // redirect register with data
            // session temp flash
            return redirect()->route('peserta.register')->with(['email.auth' => $user->email, 'nama.auth' => $user->name]);
        }
    }


    /**
     * @param $socialUser
     * @param $provider
     * @return mixed
     */
    public function findOrCreateUser($socialUser, $provider)
    {
        var_dump($provider);

    }
}
