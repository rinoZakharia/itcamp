<?php

namespace App\Http\Controllers;

use App\Mail\TaskMailer;
use App\Models\Tugas;
use App\Models\Jawab;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Revolution\Google\Sheets\Facades\Sheets;

class TugasController extends Controller
{
    public function index()
    {
        $data = Tugas::all();
        return view('back.tugas.index', compact(['data']));
    }

    public function create()
    {
        return view('back.tugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required'
        ]);
        $requestData = $request->except(['_token', 'submit']);
        if ($request->get("tipe") == 1 ) {
            try{
                $sheet = Sheets::spreadsheet($request->input('url'));
                $sheet->addSheet("Jawaban");
            }catch(\Exception $e){
                return redirect()->back()->with('errorSheet', 'Sheet tidak ditemukan')->withInput(($request->input()));
            }
            $sheet = Sheets::spreadsheet($request->get("url"));
            // check sheet exist
            if($sheet  == null){
                return redirect()->back()->with('errorSheet', 'Sheet tidak ditemukan')->withInput();
            }
        }
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $requestData['file'] = $filename;
            $file->move(public_path('uploads/tugas'), $filename);
        }
        if ($requestData['tipe'] != 1) {
            $requestData['deadline'] = null;
        }
        $tugas = Tugas::create($requestData);
        if ($tugas->tipe == 1 && $tugas->url != null) {
            $sheet = Sheets::spreadsheet($tugas->url);
            $sheet = $sheet->sheet("Jawaban");
            $sheet->clear();
            $sheet->append([[
                'Email',
                'Nama',
                'Tanggal Pengumpulan',
                'Jawaban',
                'Nilai',
            ]]);
        }

        return redirect('/back/tugas');
    }

    public function show($id)
    {
        $data = Tugas::find($id);
        return view('back.tugas.edit', compact(['data']));
    }

    public function update($id, $file, Request $request)
    {
        $tugas = Tugas::find($id);
        // make v
        if ($tugas->tipe == 1 ) {
            $sheet = Sheets::spreadsheet($request->input("url"));
            // check sheet exist
            try{
                $test = $sheet->sheet("Jawaban")->all();
            }catch(\Exception $e){
                return redirect()->back()->with('errorSheet', 'Sheet tidak ditemukan')->withInput($request->input());
            }
        }
        $requestData = $request->except(['_token', 'submit']);
        if ($request->file('file')) {
            if ($file != "kosong") {
                // Hapus file di storage
                File::delete(public_path('uploads/tugas/' . $file));
            }

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            $requestData['file'] = $filename;
            $file->move(public_path('uploads/tugas'), $filename);
        }
        if ($requestData['tipe'] != 1) {
            $requestData['deadline'] = null;
        }

        $tugas->update($requestData);
        if ($tugas->tipe == 1 && $tugas->url != null) {
            $sheet = Sheets::spreadsheet($tugas->url);
            $sheet = $sheet->sheet("Jawaban");
            $sheet->clear();
            $data = DB::table("jawabs")->join("users", 'jawabs.email', '=', 'users.email')->select(
                "jawabs.created_at",
                "jawabs.email",
                "nama",
                "kelompok",
                "jawaban",
                "nilai"
            )->where("idTugas", $tugas->idTugas)->get();
            $data = array_merge([[
                'created_at' => 'Tanggal Pengumpulan',
                'email' => 'Email',
                'nama' => 'Nama',
                'kelompok' => 'Kelompok',
                'jawaban' => 'Jawaban',
                'nilai' => 'Nilai',
            ]], json_decode(json_encode($data->toArray()), true));
            $sheet->append(($data));
        }
        return redirect('/back/tugas');
    }

    public function update_sheet($id)
    {
        $tugas = Tugas::find($id);
        if ($tugas->tipe == 1 && $tugas->url != null) {
            $sheet = Sheets::spreadsheet($tugas->url);
            $sheet = $sheet->sheet("Jawaban");
            $sheet->clear();
            $data = DB::table("jawabs")->join("users", 'jawabs.email', '=', 'users.email')->select(
                "jawabs.created_at",
                "jawabs.email",
                "nama",
                "kelompok",
                "jawaban",
                "nilai"
            )->where("idTugas", $tugas->idTugas)->get();
            $data = array_merge([[
                'created_at' => 'Tanggal Pengumpulan',
                'email' => 'Email',
                'nama' => 'Nama',
                'kelompok' => 'Kelompok',
                'jawaban' => 'Jawaban',
                'nilai' => 'Nilai',
            ]], json_decode(json_encode($data->toArray()), true));
            $sheet->append(($data));
        }
        return redirect(route('admin.nilai', ['id' => $id]));
    }

    public function collect($id)
    {
        $data = Tugas::find($id);
        $sheet = Sheets::spreadsheet($data->url);
        $sheet = $sheet->sheet("Jawaban");
        // get data
        $data = $sheet->all();
        // hapus header
        array_shift($data);
        foreach ($data as $key => $value) {
            Jawab::where('email', $value[1])->where('idTugas', $id)->update([
                'nilai' => $value[5],
                'status' => 1
            ]);
        }
        return redirect(route('admin.nilai', ['id' => $id]));
    }


    public function send_email($id)
    {
        $data = DB::table('users')->select("nama", "email")->whereRaw("email not in (select email from jawabs where idTugas=" . $id . ")")->get();
        foreach ($data as $key => $value) {
            $data = array(
                'nama' => $value->nama
            );
            $email = $value->email;
            Mail::to($email)->send(new TaskMailer($data));
            $notif = new Notification();
            $notif->email = $email;
            $notif->notification = 'Deadline tugas hampir dekat, jangan lupa untuk mengumpulkan tugas';
            $notif->save();
        }
        return redirect(route('admin.nilai', ['id' => $id]));
    }


    public function destroy($id, $file)
    {
        if ($file != "kosong") {
            // Hapus file di storage
            File::delete(public_path('uploads/tugas/' . $file));
        }

        $tugas = Tugas::find($id);
        $tugas->delete();
        return redirect('/back/tugas');
    }

    public function nilai($id = 0, $email = 0)
    {
        $data1 = Tugas::find($id);
        if ($id == 0 && $email == null) {
            $data2 = Jawab::with('tugas')->with('user')->get();
        } else {
            if ($id == 0) {
                $where = [['email', $email]];
            } elseif ($email == 0) {
                $where = [['idTugas', $id]];
            } else {
                $where = [['idTugas', $id], ['email', $email]];
            }
            $data2 = Jawab::with('tugas')->with('user')->where($where)->get();
        }
        $data = [$data1, $data2];
        return view('back.tugas.nilai', compact('data'));
    }

    // edit nilai
    public function edit($id, Request $request)
    {
        $request->validate([
            'nilai' => 'required'
        ]);
        $data = [
            'nilai' => $request->nilai,
            'status' => 1
        ];
        $jawab = Jawab::find($id);
        $jawab->update($data);
        return redirect()->back();
    }
}
