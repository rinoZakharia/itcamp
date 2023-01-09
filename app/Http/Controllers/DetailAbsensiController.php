<?php

namespace App\Http\Controllers;

use App\Models\DetailAbsensi;
use App\Http\Requests\StoreDetailAbsensiRequest;
use App\Http\Requests\UpdateDetailAbsensiRequest;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DetailAbsensiController extends Controller
{

    public function index()
    {
        $data = Absensi::where("mulai","<",date_format(now(),"Y/m/d H:i:s"))->get();
        $title = 'List Absensi';
        return view('peserta.dashboard.listabsensi', compact('data', 'title'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'review'=>'required',
            'screenshoot'=>'required'
        ]);
        $file = $request->file('screenshoot');
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/absensi'), $fileName);
        if(!$request->kesan){
            $kesan = "-";
        }else{
            $kesan =$request->kesan;
        }
        $data = [
            'screenshoot'=>$fileName,
            'review'=>$request->review,
            'kesan'=>$kesan,
            'email'=>session()->get('email.peserta'),
            'absensi_id'=>$request->absensi_id
        ];
        DetailAbsensi::create($data);
        return redirect(route("peserta.absensi"));
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
        if(!$data->collect){
            return view('peserta.dashboard.absen', compact('data','title'));
        }
        $detail = DetailAbsensi::with("user")->where(["email"=>session()->get("email.peserta"),'absensi_id'=>$data->id])->first();
        return view('peserta.dashboard.absen_status', compact('data','title','detail'));

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
