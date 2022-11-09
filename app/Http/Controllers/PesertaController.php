<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use App\Models\Peserta;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view layout
        return view('peserta.layout');
    }


    public function login()
    {
        return view('peserta.auth.login');
    }


    public function register()
    {
        return view('peserta.auth.register');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $peserta = new User();
        $peserta->nama = $request->nama;
        $peserta->email = $request->email;
        $peserta->password = bcrypt($request->password);
        $peserta->isVerified = 1;
        $peserta->save();

        Token::requestTokenRegister($peserta->email);
        return redirect()->route('peserta.login')->with('success', 'Berhasil mendaftar, silahkan login');
    }


    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $peserta = User::where('email', $request->email)->first();

        if ($peserta) {
            if (password_verify($request->password, $peserta->password)) {
                if ($peserta->isVerified == 1) {
                    // set session login user
                    session(['login.peserta' => true]);
                    session(['email.peserta' => $peserta->email]);
                    session(['nama.peserta' => $peserta->nama]);
                    return redirect()->route('peserta.dashboard');
                } else {
                    return redirect()->route('peserta.login')->withErrors(['email' => 'Akun belum diverifikasi'])->withInput();
                }
            } else {

                return redirect()->route('peserta.login')->withErrors(['password' => 'Password salah'])->withInput();
            }
        } else {
            return redirect()->route('peserta.login')->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
        }
    }


    public function logout()
    {
        // remove session login user
        session()->forget('login.peserta');
        session()->forget('email.peserta');
        session()->forget('nama.peserta');
        return redirect()->route('peserta.login');
    }




    public function forgotPassword()
    {
        return view('peserta.auth.forgot-password');
    }
}
