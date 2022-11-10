<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\User;
use Illuminate\Http\Request;


class BackController extends Controller
{
    public function index()
    {
        //
        // getCount users
        $countUser = User::count();
        // count bayar group by email where flag = 1
        $countBayar = Bayar::where('flag',1)->count();
        return view('back.index',compact(['countUser','countBayar']));
    }
}
