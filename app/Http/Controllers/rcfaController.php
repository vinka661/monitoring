<?php

namespace App\Http\Controllers;
use App\Asset;
use App\Rcfa;
use App\Fdt;
use PDF;
use Illuminate\Http\Request;

class rcfaController extends Controller
{
    public function index()
    {
        $rcfa = Rcfa::all();
        return view('rcfa.index', ['rcfa' => $rcfa]);
    }

    public function create()
    {
        $aset = Asset::all();
        return view('rcfa.create', ['aset' => $aset]);
    }

    public function store(Request $request)
    {
        Rcfa::create([
            'id_asset' => $request->aset,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'input' => $request->inp,
            'failure_mode' => $request->failure_mode,
            'evaluasi_rekom' => $request->evaluasi_rekom,
            'berulang_1_bln' => $request->berulang_1_bln,
            'berulang_3_bln' => $request->berulang_3_bln,
            'berulang_6_bln' => $request->berulang_6_bln,
            'berulang_1_th' => $request->berulang_1_th,
            'berulang_3_th' => $request->berulang_3_th,
        ]);
        return redirect('rcfa');
    }

    public function editDetail($rcfa_id)
    {
        $fdt = Fdt::all();
        $rcfa = Rcfa::find($rcfa_id);
        return view('fdt.create', ['fdt' => $fdt, 'rcfa' => $rcfa]);
    }

    public function edit($rcfa_id)
    {
        $rcfa = Rcfa::find($rcfa_id);
        $aset = Asset::all();
        return view('rcfa.edit', ['rcfa' => $rcfa, 'aset' => $aset]);
    }

    public function update(Request $request, $rcfa_id)
    {
        $rcfa = Rcfa::find($rcfa_id);
        $rcfa->rcfa_id = $request->rcfa_id;
        $rcfa->id_asset = $request->aset;
        $rcfa->keterangan = $request->keterangan;
        $rcfa->tanggal = $request->tanggal;
        $rcfa->input = $request->inp;
        $rcfa->failure_mode = $request->failure_mode;
        $rcfa->evaluasi_rekom = $request->evaluasi_rekom;
        $rcfa->berulang_1_bln = $request->berulang_1_bln;
        $rcfa->berulang_3_bln = $request->berulang_3_bln;
        $rcfa->berulang_6_bln = $request->berulang_6_bln;
        $rcfa->berulang_1_th = $request->berulang_1_th;
        $rcfa->berulang_3_th = $request->berulang_3_th;
        $rcfa->save();
        return redirect('rcfa');
    }

    public function destroy($id)
    {
        $rcfa = Rcfa::find($id);
        $rcfa->delete();
        return redirect('rcfa');
    }

    public function cetakRcfa(){
        $rcfa = Rcfa::all();
        $pdf = PDF::loadview('rcfa.cetakRcfa',['rcfa'=>$rcfa]);
        return $pdf->stream();
    }
}
