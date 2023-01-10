<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Models\DetailAbsensi;

class AbsensiController extends Controller
{
    public function index()
    {
        $data = Absensi::all();
        return view("back.absen.index",compact('data'));
    }

    public function create()
    {
        return view("back.absen.create");
    }

    public function store(StoreAbsensiRequest $request)
    {
        $request->validate([
            'mulai'=>'required',
            'selesai'=>'required',
            'judul'=>'required'
            ]
        );

        Absensi::create($request->all());
        return redirect(route("admin.absen.index"));
    }


    public function edit(Absensi $data)
    {
        return view("back.absen.edit",compact("data"));
    }

    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $request->validate([
            'mulai'=>'required',
            'selesai'=>'required',
            'judul'=>'required'
            ]
        );
        $absensi->update($request->all());

        return redirect(route("admin.absen.index"));
    }

    public function destroy(Absensi $absensi)
    {
        DetailAbsensi::where("absensi_id",$absensi->id)->delete();
        $absensi->delete();
        return redirect(route("admin.absen.index"));
    }


    public function detail(Absensi $absensi)
    {
        $data = DetailAbsensi::with("user")->where("absensi_id",$absensi->id)->get();
        return view("back.absen.detail",compact("data","absensi"));
    }
}
