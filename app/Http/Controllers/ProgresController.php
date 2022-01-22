<?php

namespace App\Http\Controllers;
use App\Progres;
use App\Fdt;
use App\Pic;
use PDF;
use Auth;
use Illuminate\Http\Request;

class ProgresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $progres = Progres::all();
        return view('progres.index', ['progres' => $progres]);
    }
    public function create()
    {
        //$progres = Progres::all();
        $fdt = Fdt::all();
        $pic = Pic::all();
        // $rcfa = Rcfa::find($rcfa_id);
        // $aset = Asset::all();
        return view('progres.create', ['fdt' => $fdt, 'pic' => $pic]);
    }

    public function store(Request $request)
    {
        Progres::create([
            'id_fdt' => $request->fdt,
            'id_pic' => $request->pic,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('progres');
    }

    public function edit($progres_id)
    {
        $progres = Progres::find($progres_id);
        $fdt = Fdt::all();
        $pic = Pic::all();
        return view('progres.edit',['progres' => $progres,'fdt' => $fdt, 'pic' => $pic]);
    }

    public function update(Request $request, $progres_id)
    {
        $progres = Progres::find($progres_id);
        $progres->progres_id = $request->progres_id;
        $progres->id_fdt = $request->fdt;
        $progres->id_pic = $request->pic;
        $progres->tanggal = $request->tanggal;
        $progres->keterangan = $request->keterangan;
        
        $progres->save();
        return redirect('progres');
    }

    public function destroy($progres_id)
    {
        $progres = Progres::find($progres_id);
        $progres->delete();
        return redirect('progres');
    }

    public function cetakProgres(){
        $progres = Progres::all();
        $pdf = PDF::loadview('progres.cetakProgres',['progres'=>$progres]);
        return $pdf->stream();
    }
}
