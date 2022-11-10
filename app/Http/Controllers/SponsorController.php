<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

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
        $file = $request->file('gambarSponsor');
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/sponsor'), $fileName);

        $data = [
            "namaSponsor" => $request->namaSponsor,
            "ukuranSponsor" => $request->ukuranSponsor,
            "gambarSponsor" => $fileName
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
            File::delete(public_path('uploads/sponsor/'.$gambarSponsor));

            $file = $request->file('gambarSponsor');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sponsor'), $fileName);
            $data = [
                "namaSponsor" => $request->namaSponsor,
                "ukuranSponsor" => $request->ukuranSponsor,
                "gambarSponsor" => $fileName
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
        File::delete(public_path('uploads/sponsor/'.$gambarSponsor));

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
