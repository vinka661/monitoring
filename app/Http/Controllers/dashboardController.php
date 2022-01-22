<?php

namespace App\Http\Controllers;
use App\Area;
use App\Asset;
use App\Rcfa;
use App\Pic;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $area = Area::get();
        $aset = Asset::get();
        $rcfa = Rcfa::get(); 
        $pic = Pic::get();
        return view('dashboard.index', compact('area','aset','rcfa','pic'));
    }
}
