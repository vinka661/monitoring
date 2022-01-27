<?php

namespace App\Http\Controllers;
use App\Area;
use App\Asset;
use App\Rcfa;
use App\Pic;
use DB;
use PDF;
use Illuminate\Http\Request;

class laporanUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
            if(Gate::allows('user')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });   
    }

    public function index()
    {
        $laporanUser = DB::table('areas')
                    ->join('assets', 'assets.id_area', '=', 'areas.area_id')
                    ->join('rcfas', 'rcfas.id_asset', '=', 'assets.asset_id')
                    // ->join('fdts', 'fdts.id_rcfa', '=', 'rcfas.rcfa_id')
                    // ->join('progress', 'progress.id_fdt', '=', 'fdts.fdt_id')
                    // ->join('pics', 'pics.pic_id', '=', 'progress.id_pic')
                    ->get();
        return view('halamanUser.laporan.index')->with('laporanUser', $laporanUser);
    }

    public function cetakLaporan(){
        $laporan = DB::table('areas')
                    ->join('assets', 'assets.id_area', '=', 'areas.area_id')
                    ->join('rcfas', 'rcfas.id_asset', '=', 'assets.asset_id')
                    ->get();
        $pdf = PDF::loadview('halamanUser.laporan.cetakLaporan',['laporanUser'=>$laporanUser]);
        return $pdf->stream();
    }
}
