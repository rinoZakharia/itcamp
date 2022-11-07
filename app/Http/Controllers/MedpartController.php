<?php

namespace App\Http\Controllers;

use App\Models\Medpart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Medpart::all();

        return view('back.medpart.index',compact(['data']));
    }

    public function create()
    {
        return view('back.medpart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = $request->file('gambarMed')->extension();
        $newName = $request->namaMed.'-'.now()->timestamp.'.'.$extension;
        Storage::putFileAs('media',$request->file('gambarMed'),$newName,'private');

        $data = [
            "namaMed" => $request->namaMed,
            "gambarMed" => $newName
        ];
        Medpart::create($data);
        return redirect('/back/medpart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medpart  $medpart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Medpart::find($id);
        return view('back.medpart.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medpart  $medpart
     * @return \Illuminate\Http\Response
     */
    public function update($id,$gambarMed,Request $request)
    {
        $data = [
            "namaMed" => $request->namaMed
        ];
        if ($request->file('gambarMed')) {
            // Hapus file di storage
            Storage::delete('media/'.$gambarMed);

            $extension = $request->file('gambarMed')->extension();
            $newName = $request->namaMed.'-'.now()->timestamp.'.'.$extension;
            Storage::putFileAs('media',$request->file('gambarMed'),$newName,'private');
            $data = [
                "namaMed" => $request->namaMed,
                "gambarMed" => $newName
            ];
        }

        $medpart = Medpart::find($id);
        $medpart->update($data);
        return redirect('/back/medpart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medpart  $medpart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$gambarMed)
    {
        Storage::delete('media/'.$gambarMed);

        $medpart = Medpart::find($id);
        $medpart->delete();
        return redirect('/back/medpart');
    }

    public function getAPI()
    {
        $data = Medpart::all();

        return response()->json($data);
    }
}
