<?php

namespace App\Http\Controllers;
use App\Area;
use App\Asset;
use App\Rcfa;
use App\Pic;
use App\Progres;
use Redirect,Response;
Use DB;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    public function dashboard()
    {
        $area1 = Area::all();
        $area = Area::get();
        $aset = Asset::get();
        $rcfa = Rcfa::get(); 
        $pic = Pic::get();
        $kajian = DB::table('progress')
            ->where('nama_progres', '=', 'Kajian')
            ->count();
        $perencanaan = DB::table('progress')
            ->where('nama_progres', '=', 'Prerencanaan')
            ->count();
        $pengadaan = DB::table('progress')
            ->where('nama_progres', '=', 'Pengadaan')
            ->count();
        $eksekusi = DB::table('progress')
            ->where('nama_progres', '=', 'Eksekusi')
            ->count();
        $finish = DB::table('progress')
            ->where('nama_progres', '=', 'Finish')
            ->count();
        return view('dashboard.index', compact('kajian','perencanaan','pengadaan','eksekusi','finish','area','aset','rcfa','pic', 'area1'));
    }
}