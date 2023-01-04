<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use App\Mail\ResetMail;
use App\Models\Bayar;
use App\Models\Config;
use App\Models\Jawab;
use App\Models\Notification;
use App\Models\Peserta;
use App\Models\Token;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PesertaController extends Controller
{
    public function index()
    {
        $user = User::where('email', session()->get('email.peserta'))->first();
        return view('peserta.dashboard.account', [
            'user' => $user,
            'title' => 'Akunku',
        ]);
    }


    public function login()
    {
        return view('peserta.auth.login');
    }


    public function register()
    {
        $name = session()->get('nama.auth');
        $email = session()->get('email.auth');

        if($name && $email){
            return view('peserta.auth.register', [
                'name' => $name,
                'email' => $email,
            ]);
        }else{
            return redirect()->route('peserta.login');
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['email.auth' => $request->email, 'nama.auth' => $request->nama]);
        }
        $peserta = new User();
        $peserta->nama = $request->nama;
        $peserta->email = $request->email;
        $peserta->password = bcrypt($request->password);
        $peserta->isVerified = 1;
        $peserta->save();
        session(['login.peserta' => true]);
        session(['email.peserta' => $peserta->email]);
        session(['nama.peserta' => $peserta->nama]);
        session(['check.peserta' => false]);
        return redirect()->route('peserta.account');

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
                    session(['check.peserta' => User::isPayed()]);
                    return redirect()->route('peserta.account');
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
        session()->forget('check.peserta');
        return redirect()->route('peserta.login');
    }




    public function forgotPassword()
    {
        return view('peserta.auth.forgot');
    }

    public function information(){
        // check is payed
        if (!User::isPayed()) {
            return redirect()->route('peserta.account');
        }
        $data = Config::find("message.payed");
        if($data==null){
            $data= new Config();
            $data->key= 'message.payed';
            $data->value= '<p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal; mso-outline-level: 2;"><strong><span style="font-family: helvetica, arial, sans-serif;"><span style="font-size: 18pt;">Terima Kasih</span></span></strong></p>
            <p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">Telah bergabung dengan <strong>HIMATIFA X Partnership UI/UX Mini Bootcamp</strong>. <strong>HIMATIFA X Partnership UI/UX Mini Bootcamp</strong> merupakan rangkaian mini bootcamp yang diadakan oleh <strong>Himpunan Mahasiswa Informatika Universitas Pembangunan Nasional "Veteran" Jawa Timur</strong> dengan tujuan untuk mengenalkan UI/UX dikalangan pelajar/mahasiswa/umum.</span></p>
            <p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;"><span style="font-family: helvetica, arial, sans-serif;"><strong><span style="font-size: 12pt;">HIMATIFA X Partnership UI/UX Mini Bootcamp</span></strong><span style="font-size: 12pt;">&nbsp;diperuntukan untuk pelajar/mahasiswa/umum. Acara ini mengusung tema "<strong>Show Your Skills and Build Your Career</strong>" dengan harapan peserta dapat meningkatkan wawasan, kemampuan serta dapat karir di bidang UI/UX</span></span></p>
            <ul type="disc">
            <li class="MsoNormal" style="line-height: normal; font-family: helvetica, arial, sans-serif;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">&nbsp;E-sertifikat</span></li>
            <li class="MsoNormal" style="line-height: normal; font-family: helvetica, arial, sans-serif;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">&nbsp;Ilmu</span></li>
            <li class="MsoNormal" style="line-height: normal; font-family: helvetica, arial, sans-serif;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">&nbsp;Menambah pengalaman dan networking</span></li>
            </ul>
            <p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;">&nbsp;</p>
            <p class="MsoNormal" style="mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;"><span style="font-size: 12pt; font-family: helvetica, arial, sans-serif;">Untuk informasi lebih lanjut terkait acara anda dapat bergabung pada link berikut :</span></p>
            <p><a class="btn btn-success" href="#">Bergabung dengan Whatsapp</a></p>';
            $data->save();
        }
        return view('peserta.dashboard.information',[
            'title' => 'Informasi',
            'data' => $data
        ]);
    }

    public function requestReset(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        $lastRequest = Token::where('email', $request->email)->where('type', 'resetPassword')->orderBy('created_at', 'desc')->first();
        if ($lastRequest) {
            if (strtotime($lastRequest->created_at) + 600 > time()) {
                return redirect()->route('peserta.forgot')->with('error', 'Anda sudah melakukan permintaan reset password, silahkan cek email anda');
            }
        }
        $token = Token::requestTokenResetPassword($request->email);

        // send email url
        $url = route('peserta.reset', ['token' => $token->token]);
        $email = $request->email;
        $nama = User::where('email', $email)->first()->nama;
        $data = [
            'nama' => $nama,
            'url' => $url,
        ];
        // send emails
        Mail::to($email)->send(new ResetMail($data));
        return redirect()->route('peserta.login')->with('success', 'Silahkan cek email anda');
    }

    public function resetPassword($token)
    {
        $token = Token::where('token', $token)->first();
        if ($token) {
            return view('peserta.auth.reset', [
                'token' => $token->token,
            ]);
        } else {
            return redirect()->route('peserta.login')->with('error', 'Token tidak ditemukan');
        }
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $token = Token::where('token', $request->token)->first();
        if ($token) {
            $peserta = User::where('email', $token->email)->first();
            $peserta->password = bcrypt($request->password);
            $peserta->save();
            $token->delete();
            return redirect()->route('peserta.login')->with('success', 'Berhasil mereset password');
        } else {
            return redirect()->route('peserta.login')->with('error', 'Token tidak ditemukan');
        }
    }

    public function changeProfile(Request $request)
    {
        if ($request->telp) {
            $request->validate([
                'nama' => 'required',
                'instansi' => 'required',
                'telp' => 'digits_between:10,15',

            ]);
        } else {
            $request->validate([
                'nama' => 'required',
                'instansi' => 'required',
            ]);
        }
        $user = User::where('email', session()->get('email.peserta'))->first();
        $user->nama = $request->nama;
        $user->instansi = $request->instansi;
        $user->kelamin = $request->kelamin;
        // check request telp
        if ($request->telp) {
            $user->telp = $request->telp;
        }
        $user->save();
        return redirect()->route('peserta.account')->with('success', 'Berhasil mengubah profil');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
            'old_password' => 'required'
        ]);

        $user = User::where('email', session()->get('email.peserta'))->first();
        if (password_verify($request->old_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('peserta.account')->with('success', 'Berhasil mengubah password');
        } else {
            return redirect()->route('peserta.account')->withErrors(['old_password' => 'Password Lama anda salah'])->withInput();
        }
    }

    public function payment()
    {
        if(User::isChecked()){
            $data = User::getLastPayment();
            return view('peserta.dashboard.payment_status', [
                'title' => 'Status Pembayaran',
                'data' => $data
            ]);
        }else{
            return view('peserta.dashboard.payment', [
                'title' => 'Pembayaran',
            ]);
        }

    }

    public function listTask(){
        $data = Tugas::all();
        return view('peserta.dashboard.listtask', [
            'title' => 'Daftar Tugas',
            'data' => $data
        ]);
    }

    public function task($id){
        $data = Tugas::find($id);
        if($data->tipe == 1){
            $data['jawaban'] = Jawab::where('idTugas', $id)->where('email',session()->get('email.peserta'))->first();
        }
        return view('peserta.dashboard.task', [
            'title' => 'Tugas',
            'data' => $data
        ]);
    }

    public function sertifikat(){

        return view('peserta.dashboard.sertifikat', [
            'title' => 'Sertifikat',
        ]);
    }

    public function uploadPayment(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $file = $request->file('bukti_pembayaran');
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/bukti_pembayaran'), $fileName);
        $bayar = new Bayar();
        $bayar->email = session()->get('email.peserta');
        $bayar->gambarBayar = $fileName;
        $bayar->tglDaftar = date('Y-m-d');
        $bayar->bank = $request->bank;
        $bayar->save();

        // make notification
        $notif = new Notification();
        $notif->email = session()->get('email.peserta');
        $notif->notification = 'Pembayaran berhasil diupload, silahkan tunggu konfirmasi dari panitia';
        $notif->save();

        return redirect()->route('peserta.payment')->with('success', 'Berhasil mengupload bukti pembayaran');

    }
}
