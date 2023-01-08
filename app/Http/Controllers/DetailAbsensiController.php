<?php

namespace App\Http\Controllers;

use App\Models\DetailAbsensi;
use App\Http\Requests\StoreDetailAbsensiRequest;
use App\Http\Requests\UpdateDetailAbsensiRequest;
use App\Models\Absensi;

class DetailAbsensiController extends Controller
{

    public function index()
    {
        $data = Absensi::all();
        $title = 'List Absensi';
        return view('peserta.dashboard.listabsensi', compact('data', 'title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailAbsensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailAbsensiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailAbsensi  $detailAbsensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $data)
    {
        $title = 'Absensi '.$data->judul;
        return view('peserta.dashboard.absen', compact('data','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailAbsensi  $detailAbsensi
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailAbsensi $detailAbsensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailAbsensiRequest  $request
     * @param  \App\Models\DetailAbsensi  $detailAbsensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailAbsensiRequest $request, DetailAbsensi $detailAbsensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailAbsensi  $detailAbsensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailAbsensi $detailAbsensi)
    {
        //
    }
}
