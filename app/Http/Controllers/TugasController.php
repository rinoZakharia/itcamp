<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Jawab;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class TugasController extends Controller
{
    public function index()
    {
        $data = Tugas::all();
        return view('back.tugas.index',compact(['data']));
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
        $requestData = $request->except(['_token','submit']);
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $requestData['file'] = $filename;
            $file->move(public_path('uploads/tugas'), $filename);
        }
        if ($requestData['tipe'] != 1) {
            $requestData['deadline'] = null;
        }
        Tugas::create($requestData);
        return redirect('/back/tugas');
    }
    
    public function show($id)
    {
        $data = Tugas::find($id);
        return view('back.tugas.edit',compact(['data']));
    }
    
    public function update($id,$file,Request $request)
    {
        $requestData = $request->except(['_token','submit']);
        if ($request->file('file')) {
            if ($file != "kosong") {
                // Hapus file di storage
                File::delete(public_path('uploads/tugas/'.$file));
            }

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            
            $requestData['file'] = $filename;
            $file->move(public_path('uploads/tugas'), $filename);
        }
        if ($requestData['tipe'] != 1) {
            $requestData['deadline'] = null;
        }
        $tugas = Tugas::find($id);
        $tugas->update($requestData);
        return redirect('/back/tugas');
    }
    
    public function destroy($id,$file)
    {
        if ($file != "kosong") {
            // Hapus file di storage
            File::delete(public_path('uploads/tugas/'.$file));
        }
        
        $tugas = Tugas::find($id);
        $tugas->delete();
        return redirect('/back/tugas');
    }

    public function nilai($id = 0, $email = 0)
    {
        $data1 = Tugas::where('tipe',1)->get();
        if ($id == 0 && $email == null) {
            $data2 = Jawab::with('tugas')->with('user')->get();
        } else {
            if ($id == 0) {
                $where = [['email',$email]];
            } else {    
                $where = [['idTugas',$id],['email',$email]];
            }
            $data2 = Jawab::with('tugas')->with('user')->where($where)->get();
        }
        $data = [$data1,$data2];
        return view('back.tugas.nilai',compact('data'));
    }

    // edit nilai
    public function edit($id,$idTugas,Request $request)
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
