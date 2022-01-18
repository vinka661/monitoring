<?php

namespace App\Http\Controllers;
use App\Rcfa;
use App\FdtPic;
use Illuminate\Http\Request;

class fdtPicController extends Controller
{
    public function index()
    {
        $fdtPic = FdtPic::all();
        return view('halamanPic.fdt.index', ['fdtPic' => $fdtPic]);
    }
}
