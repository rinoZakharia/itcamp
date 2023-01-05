<?php

namespace App\Http\Controllers;

use App\Models\Medpart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

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
        $request->validate([
            'namaMed' => 'required',
            'urlMed' => 'required',
            'gambarMed' => 'required'
        ]);
        $file = $request->file('gambarMed');
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/media'), $fileName);

        $data = [
            "namaMed" => $request->namaMed,
            "urlMed" => $request->urlMed,
            "gambarMed" => $fileName
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
        $request->validate([
            'namaMed' => 'required',
            'urlMed' => 'required'
        ]);
        $data = [
            "namaMed" => $request->namaMed,
            "urlMed" => $request->urlMed,
        ];
        if ($request->file('gambarMed')) {
            // Hapus file di storage
            File::delete(public_path('uploads/media/'.$gambarMed));

            $file = $request->file('gambarMed');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/media'), $fileName);
            $data = [
                "namaMed" => $request->namaMed,
                "urlMed" => $request->urlMed,
                "gambarMed" => $fileName
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
        File::delete(public_path('uploads/media/'.$gambarMed));

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
