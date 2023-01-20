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
        return redirect(route('peserta.task',['id'=>$request->idTugas]));
    }

    public function destroy(Request $request)
    {
        $id = $request->idJawaban;
        $data = Jawab::find($id);
        $idtugas = $data->idTugas;
        $data->delete();

        return redirect(route('peserta.task',['id'=>$idtugas]));

    }
}
