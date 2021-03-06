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

    public function create(Fdt $fdt)
    {
        $progres = Progres::all();
        //$fdt = Fdt::all();
        $pic = Pic::where('level', 'PIC')->get();
        // $rcfa = Rcfa::find($rcfa_id);
        // $aset = Asset::all();
        return view('progres.create', ['fdt' => $fdt, 'pic' => $pic]);
    }

    public function store(Request $request)
    {
        Progres::create([
            'id_fdt' => $request->id_fdt,
            'id_pic' => $request->pic,
            'tanggal_progres' => $request->tanggal_progres,
            'nama_progres' => $request->nama_progres,
            'ket_progres' => $request->ket_progres,
            'tanggal_target' => $request->tanggal_target,
            'status' => 0,
        ]);
        return redirect()->route('detailProgres', ['fdt_id' => $request->id_fdt])->with('success','Data Progres Berhasil Ditambahkan');
    }

    public function edit($progres_id)
    {
        $progres = Progres::find($progres_id);
        $fdt = Fdt::all();
        $pic = Pic::where('level', 'PIC')->get();
        return view('progres.edit',['progres' => $progres,'fdt' => $fdt, 'pic' => $pic]);
    }

    public function update(Request $request, $progres_id)
    {
        $progres = Progres::find($progres_id);
        $progres->id_fdt = $request->id_fdt;
        $progres->id_pic = $request->pic;
        $progres->tanggal_progres = $request->tanggal_progres;
        $progres->nama_progres = $request->nama_progres;
        $progres->ket_progres = $request->ket_progres;
        $progres->tanggal_target = $request->tanggal_target;
        $progres->status = 0;
        $progres->save();
        return redirect()->route('detailProgres', ['fdt_id' => $request->id_fdt])->with('success','Data Progres Berhasil Diedit');
    }

    public function destroy($progres_id)
    {
        $progres = Progres::find($progres_id);
        $progres->delete();
        return redirect()->route('detailProgres', ['fdt_id' => $progres->id_fdt])->with('success','Data Progres Berhasil Dihapus');
    }

    public function cetakProgres(){
        $progres = Progres::all();
        $pdf = PDF::loadview('progres.cetakProgres',['progres'=>$progres]);
        return $pdf->stream();
    }
}
