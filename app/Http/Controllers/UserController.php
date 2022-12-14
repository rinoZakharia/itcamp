<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        return view('back.pengguna.index',compact(['data']));
    }

    public function bayar()
    {
        $delay = Bayar::with('user')->where('flag',0)->orderBy("tglDaftar","desc")->get();
        $payed = Bayar::with('user')->where('flag',1)->orderBy("tglDaftar","desc")->get();
        return view('back.pengguna.bayar',compact(['delay','payed']));

    }

    public function confirmation($id){
        // check if key.admin
        if(session()->get('key.admin') == env('ADMIN_KEY')){
            $data = Bayar::find($id);
            $data->flag = 1;
            $data->tglAcc = date("Y-m-d H:i:s");
            $data->save();

            // send notification
            $notif = new Notification();
            $notif->email = $data->email;
            $notif->notification = "Pembayaran anda telah dikonfirmasi";
            $notif->save();

            return redirect()->back();
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function reject($id){
        // check if key.admin
        if(session()->get('key.admin') == env('ADMIN_KEY')){
            $data = Bayar::find($id);
            $data->flag = 2;
            $data->save();
            // send notification
            $notif = new Notification();
            $notif->email = $data->email;
            $notif->notification = "Pembayaran anda telah ditolak, silahkan cek kembali bukti pembayaran anda";
            $notif->save();
            return redirect()->back();
        }else{
            return redirect()->route('admin.login');
        }
    }
}
