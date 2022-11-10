<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        if(session()->has('key.admin'))
        {
            if(session()->get('key.admin') == env('APP_KEY'))
            {
                return redirect()->route('admin.dashboard');
            }
        }
        return view('back.login');
    }

    public function signin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $admin = Admin::where('emailAdmin',$request->email)->first();
        if($admin){
            if(Hash::check($request->password,$admin->passwordAdmin)){
                session()->put('key.admin', env('APP_KEY'));
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->back()->withErrors(['password' => 'Password salah']);
            }
        }else{
            return redirect()->back()->withErrors(['email' => 'Email tidak terdaftar']);
        }
    }


    public function logout(){
        session()->forget('key.admin');
        return redirect()->route('admin.login');
    }
}
