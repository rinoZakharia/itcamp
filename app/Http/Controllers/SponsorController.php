<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sponsor::all();

        return view('back.sponsor.index',compact(['data']));
    }

    public function create()
    {
        return view('back.sponsor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = $request->file('gambarSponsor')->extension();
        $newName = $request->namaSponsor.'-'.now()->timestamp.'.'.$extension;
        Storage::putFileAs('sponsor',$request->file('gambarSponsor'),$newName,'private');

        $data = [
            "namaSponsor" => $request->namaSponsor,
            "ukuranSponsor" => $request->ukuranSponsor,
            "gambarSponsor" => $newName
        ];
        Sponsor::create($data);
        return redirect('/back/sponsor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sponsor::find($id);
        return view('back.sponsor.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update($id,$gambarSponsor,Request $request)
    {
        $data = [
            "namaSponsor" => $request->namaSponsor,
            "ukuranSponsor" => $request->ukuranSponsor
        ];
        if ($request->file('gambarSponsor')) {
            // Hapus file di storage
            Storage::delete('sponsor/'.$gambarSponsor);

            $extension = $request->file('gambarSponsor')->extension();
            $newName = $request->namaSponsor.'-'.now()->timestamp.'.'.$extension;
            Storage::putFileAs('sponsor',$request->file('gambarSponsor'),$newName,'private');
            $data = [
                "namaSponsor" => $request->namaSponsor,
                "ukuranSponsor" => $request->ukuranSponsor,
                "gambarSponsor" => $newName
            ];
        }

        $sponsor = Sponsor::find($id);
        $sponsor->update($data);
        return redirect('/back/sponsor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$gambarSponsor)
    {
        Storage::delete('sponsor/'.$gambarSponsor);

        $sponsor = Sponsor::find($id);
        $sponsor->delete();
        return redirect('/back/sponsor');
    }

    public function getAPI()
    {
        $data = Sponsor::all();

        return response()->json($data);
    }
}
