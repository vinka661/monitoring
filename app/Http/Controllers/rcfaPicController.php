<?php

namespace App\Http\Controllers;
use App\Asset;
use App\RcfaPic;
use Illuminate\Http\Request;

class rcfaPicController extends Controller
{
    public function index()
    {
        $rcfaPic = RcfaPic::all();
        return view('halamanPic.rcfa.index', ['rcfaPic' => $rcfaPic]);
    }

    // public function create()
    // {
    //     $aset = Asset::all();
    //     return view('rcfa.create', ['aset' => $aset]);
    // }
}
