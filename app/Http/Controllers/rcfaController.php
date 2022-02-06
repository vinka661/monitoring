<?php

namespace App\Http\Controllers;
use App\Asset;
use App\Rcfa;
use App\Fdt;
use App\Progres;
use App\Upload;
use PDF;
use Illuminate\Http\Request;

class rcfaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rcfa = Rcfa::with([
                    'Fdt',
                    'Fdt.Progres' => function($q){
                        $q->where('nama_progres','Finish');
                    },
        ])->get();
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
        return redirect('rcfa')->with('success','Data RCFA berhasil ditambahkan');
    }

    public function editDetail($rcfa_id)
    {
        $fdt = Fdt::all();
        $rcfa = Rcfa::find($rcfa_id);
        $rcfa1 = Rcfa::all();
        return view('fdt.create', ['fdt' => $fdt, 'rcfa' => $rcfa, 'rcfa1' => $rcfa1]);
    }

    // public function show($nid)
    // {
    //     $rcfa = Rcfa::where('nid', '=', $nid)->first();
    //     return view('halamanPic.rcfa.index', ['rcfa' => $rcfa]);
    // }

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
        return redirect('rcfa')->with('success','Data RCFA berhasil diedit');
    }

    public function destroy($id)
    {
        $rcfa = Rcfa::find($id);
        $rcfa->delete();
        return redirect('rcfa')->with('success','Data RCFA berhasil dihapus');
    }

    public function cetakRcfa(){
        $rcfa = Rcfa::all();
        $pdf = PDF::loadview('rcfa.cetakRcfa',['rcfa'=>$rcfa]);
        return $pdf->stream();
    }

    public function detailFdt($rcfa_id)
    {
        $rcfa = Rcfa::find($rcfa_id);
        $aset = Asset::all();
        $fdt = Fdt::where('id_rcfa', '=', $rcfa_id)->get();
        return view('fdt.detailFdt', ['rcfa' => $rcfa, 'aset' => $aset, 'fdt' => $fdt]);
    }

    public function upload($rcfa_id)
    {
        $rcfa = Rcfa::find($rcfa_id);
        $upload = Upload::where('id_rcfa', '=', $rcfa_id)->get();
        return view('upload.detailUpload', ['rcfa' => $rcfa, 'upload' => $upload]);
    }
    
}
