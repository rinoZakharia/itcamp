<?php

namespace App\Http\Controllers;

use App\Models\Jawab;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Revolution\Google\Sheets\Facades\Sheets;

class JawabController extends Controller
{
    public function post(Request $request)
    {
        $request->validate([
            'jawaban' => 'required',
            'idTugas' => 'required'
        ]);
        $requestData['idTugas'] = $request->idTugas;
        $requestData['email'] = session()->get('email.peserta');
        $requestData['jawaban'] = $request->jawaban;
        $requestData['nilai'] = 0;

        Jawab::create($requestData);
        $tugas = Tugas::find($request->idTugas);
        if($tugas->tipe == 1 && $tugas->url != null){
            $sheet = Sheets::spreadsheet($tugas->url);
            $sheet = $sheet->sheet("Jawaban");
            $sheet->clear();
            $data = DB::table("jawabs")->join("users",'jawabs.email','=','users.email')->select(
                "jawabs.email","nama","jawabs.created_at","jawaban","nilai"
            )->where("idTugas",$tugas->idTugas)->get();
            $data =array_merge([[
                'email'=>'Email',
                'nama'=>'Nama',
                'created_at'=>'Tanggal Pengumpulan',
                'jawaban'=>'Jawaban',
                'nilai'=>'Nilai',
            ]],json_decode(json_encode($data->toArray()), true));
            $sheet->append(($data));

        }
        return redirect(route('peserta.task',['id'=>$request->idTugas]));
    }

    public function destroy(Request $request)
    {
        $id = $request->idJawaban;
        $data = Jawab::find($id);
        $idtugas = $data->idTugas;
        $data->delete();
        $tugas = Tugas::find($idtugas);
        if($tugas->tipe == 1 && $tugas->url != null){
            $sheet = Sheets::spreadsheet($tugas->url);
            $sheet = $sheet->sheet("Jawaban");
            $sheet->clear();
            $data = DB::table("jawabs")->join("users",'jawabs.email','=','users.email')->select(
                "jawabs.email","nama","jawabs.created_at","jawaban","nilai"
            )->where("idTugas",$tugas->idTugas)->get();

            $data =array_merge([[
                'email'=>'Email',
                'nama'=>'Nama',
                'created_at'=>'Tanggal Pengumpulan',
                'jawaban'=>'Jawaban',
                'nilai'=>'Nilai',
            ]],json_decode(json_encode($data->toArray()), true));
            $sheet->append(($data));
            }
        return redirect(route('peserta.task',['id'=>$idtugas]));

    }
}
