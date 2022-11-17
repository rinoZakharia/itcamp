<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
}
