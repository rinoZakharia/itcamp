<?php

namespace App\Http\Controllers;

use App\Mail\WhastappInvite;
use App\Models\Admin;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            if(session()->get('key.admin') == env('ADMIN_KEY'))
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
                session()->put('key.admin', env('ADMIN_KEY'));
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->back()->withErrors(['password' => 'Password salah']);
            }
        }else{
            return redirect()->back()->withErrors(['email' => 'Email tidak terdaftar']);
        }
    }

    public function kirimInvitanWhatsapp(){
        $data = Notification::where('notification', 'Pembayaran anda telah dikonfirmasi')->where('is_read',0)->groupBy("email")->get("email");
        Notification::where('notification', 'Pembayaran anda telah dikonfirmasi')->where('is_read',0)->update(['is_read' => 1]);
        foreach($data as $d){
            $user = User::where('email', $d->email)->first("nama");
            $email = $d->email;
            $nama = $user->nama;
            $data = [
                'nama' => $nama
            ];
            // send emails
            Mail::to($email)->send(new WhastappInvite($data));
        }
        return redirect()->route('admin.bayar');
    }

    public function logout(){
        session()->forget('key.admin');
        return redirect()->route('admin.login');
    }
}
