<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BackController extends Controller
{
    public function index()
    {
        return view('back.index');
    }
}
