<?php

namespace App\Http\Controllers;
use App\Area;
use App\Asset;
use App\Rcfa;
use App\Pic;
use DB;
use PDF;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $laporan = DB::table('areas')
                    ->join('assets', 'assets.id_area', '=', 'areas.area_id')
                    ->join('rcfas', 'rcfas.id_asset', '=', 'assets.asset_id')
                    ->join('fdts', 'fdts.id_rcfa', '=', 'rcfas.rcfa_id')
                    ->join('progress', 'progress.id_fdt', '=', 'fdts.fdt_id')
                    ->join('pics', 'pics.pic_id', '=', 'progress.id_pic')
        
                    ->get();
        return view('laporan.index')->with('laporan', $laporan);
    }

    public function cetakLaporan(){
        $laporan = DB::table('areas')
                    ->join('assets', 'assets.id_area', '=', 'areas.area_id')
                    ->join('rcfas', 'rcfas.id_asset', '=', 'assets.asset_id')
                    ->join('fdts', 'fdts.id_rcfa', '=', 'rcfas.rcfa_id')
                    ->join('progress', 'progress.id_fdt', '=', 'fdts.fdt_id')
                    ->join('pics', 'pics.pic_id', '=', 'progress.id_pic')
                    ->get();
        $pdf = PDF::loadview('laporan.cetakLaporan',['laporan'=>$laporan]);
        return $pdf->stream();
    }
}
