<?php

namespace App\Http\Controllers;

use App\Models\User;
use Revolution\Google\Sheets\Facades\Sheets;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheet =Sheets::spreadsheet("1KlRWvGkdPDGtBRfcRxTzzuuir_dQyqg6OlQIK-V7GDo")
        ->sheet("Sheet1");
        // $sheet->clear();
        // $data = User::all();
        // $sheet->append($data->toArray());
        $data = $sheet->all();
        var_dump($data);
    }



}
