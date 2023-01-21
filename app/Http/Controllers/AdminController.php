<?php

namespace App\Http\Controllers;

use App\Mail\WhastappInvite;
use App\Models\Admin;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Revolution\Google\Sheets\Facades\Sheets;

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

    public function grouping(Request $request){
        $id = $request->id;
        $data = DB::table("users")->whereRaw("email in (select email from bayars where flag=1)")->get(['nama','email','kelompok','instansi','telp']);


        $result = [];
        // input all group to array with new filed group index

        $header = [
            'nama'=>'Nama',
            'email'=>'Email',
            'kelompok'=>'Kelompok',
            'instansi'=>'Instansi',
            'no_hp'=>'No HP',
        ];

        //  add header to first row result
        $result = array_merge([$header], $data);
        try {
            $sheet = Sheets::spreadsheet($id);
            $sh = $sheet->sheet('Peserta');
            // clear sheet peserta
            $sh->clear();
            // add header to sheet peserta
            $sh->append($result);
            return redirect()->to("https://docs.google.com/spreadsheets/d/".$id."/edit");
        } catch (\Throwable $th) {
            //throw $th;
            try {
                $sheet = Sheets::spreadsheet($id);
                $sheet->addSheet('Peserta');
                $sh = $sheet->sheet('Peserta');

                // clear sheet peserta
                $sh->clear();
                // add header to sheet peserta
                $sh->append($result);
                return redirect()->to("https://docs.google.com/spreadsheets/d/".$id."/edit");
            } catch (\Throwable $th) {
                //throw $th;
                print_r($th);
            }
        }

    }

    public function setGroup(Request $request){
        $id = $request->id;
        $sheet = Sheets::spreadsheet($id);
        $sh = $sheet->sheet('Peserta');
        $data = $sh->all();
        $data = array_slice($data, 1);
        foreach($data as $d){
            User::where('email', $d[1])->update(['kelompok' => $d[2]]);
        }
        return redirect()->route('admin.dashboard');
    }

    public function logout(){
        session()->forget('key.admin');
        return redirect()->route('admin.login');
    }
}
