<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Models\DetailAbsensi;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class AbsensiController extends Controller
{
    public function index()
    {
        $data = Absensi::all();
        return view("back.absen.index", compact('data'));
    }

    public function create()
    {
        return view("back.absen.create");
    }

    public function store(StoreAbsensiRequest $request)
    {
        $request->validate(
            [
                'mulai' => 'required',
                'selesai' => 'required',
                'judul' => 'required'
            ]
        );

        Absensi::create($request->all());
        return redirect(route("admin.absen.index"));
    }


    public function edit(Absensi $data)
    {
        return view("back.absen.edit", compact("data"));
    }

    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $request->validate(
            [
                'mulai' => 'required',
                'selesai' => 'required',
                'judul' => 'required'
            ]
        );
        $absensi->update($request->all());

        return redirect(route("admin.absen.index"));
    }

    public function destroy(Absensi $absensi)
    {
        DetailAbsensi::where("absensi_id", $absensi->id)->delete();
        $absensi->delete();
        return redirect(route("admin.absen.index"));
    }


    public function detail(Absensi $absensi)
    {
        $data = DetailAbsensi::with("user")->where("absensi_id", $absensi->id)->get();
        return view("back.absen.detail", compact("data", "absensi"));
    }


    public function export(Request $request)
    {
        $id = $request->id;
        $idsheet = $request->sheet;
        // make sheeet to string

        $data = DetailAbsensi::with("user")->where("absensi_id", $id)->get();
        try {
            $sheet  = Sheets::spreadsheet($idsheet);
            $sheet = $sheet->sheet('Absensi');
            $sheet->clear();
            $values[] = [
                "nama" => "Nama",
                "email" => "Email",
                "review" => "Review",
                "kesan" => "Kesan",
                "screenshoot" => "Screenshoot"
            ];
            foreach ($data as $key => $value) {
                $values[] = [
                    "nama" => $value->user->nama,
                    "email" => $value->user->email,
                    "review" => $value->review,
                    "kesan" => $value->kesan,
                    "screenshoot" => "https://itcamp2023.com/uploads/absensi/" . $value->screenshoot
                ];
            }

            // var_dump($values);
            $sheet->append($values);
            return redirect("https://docs.google.com/spreadsheets/d/".$idsheet."/edit");
        } catch (\Exception $e) {
            try {
                $sheet  = Sheets::spreadsheet($idsheet);
                $sheet->addSheet('Absensi');
                $sheet = $sheet->sheet('Absensi');
                $sheet->clear();
                $values = [
                    "nama" => "Nama",
                    "email" => "Email",
                    "review" => "Review",
                    "kesan" => "Kesan",
                    "screenshoot" => "Screenshoot"
                ];
                foreach ($data as $key => $value) {
                    $values[] = [
                        "nama" => $value->user->name,
                        "email" => $value->user->email,
                        "review" => $value->review,
                        "kesan" => $value->kesan,
                        "screenshoot" => "https://itcamp2023.com/uploads/absensi/" . $value->screenshoot
                    ];
                }

                $sheet->append($values);
                return redirect("https://docs.google.com/spreadsheets/d/".$idsheet."/edit");
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
