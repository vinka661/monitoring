<?php

namespace App\Http\Controllers;
use App\Rcfa;
use App\Fdt;
use Illuminate\Http\Request;

class fdtController extends Controller
{
    public function index()
    {
        $fdt = Fdt::all();
        return view('fdt.index', ['fdt' => $fdt]);
    }

    public function create()
    {
        $rcfa = Rcfa::all();
        $fdt = Fdt::all();
        // $rcfa = Rcfa::find($rcfa_id);
        // $aset = Asset::all();
        return view('fdt.create', ['rcfa' => $rcfa]);
    }

    public function store(Request $request)
    {
        // if($request->file('upload_kajian')){ 
		// 	$upload_kajian = $request->file('upload_kajian')->store('files','public');
        // }
        Fdt::create([
            'id_rcfa' => $request->id_rcfa,
            'root_cause' => $request->root_cause,
            'nama_fdt' => $request->nama_fdt,
            'jangka' => $request->jangka,
            'target' => $request->target,
            'no_wo' => $request->no_wo,
            'actual_finish' => $request->actual_finish,
            'rkap_rjpu' => $request->rkap_rjpu,
            // 'upload_kajian' => $upload_kajian,
        ]);
        return redirect('fdt');
    }

    public function edit($fdt_id)
    {
        $fdt = Fdt::find($fdt_id);
        $rcfa = Rcfa::all();
        return view('fdt.edit', ['fdt' => $fdt, 'rcfa' => $rcfa]);
    }

    public function update(Request $request, $fdt_id)
    {
        $fdt = Fdt::find($fdt_id);
        $fdt->id_rcfa = $request->id_rcfa;
        $fdt->root_cause = $request->root_cause;
        $fdt->nama_fdt = $request->nama_fdt;
        $fdt->jangka = $request->jangka;
        $fdt->target = $request->target;
        $fdt->no_wo = $request->no_wo;
        $fdt->actual_finish = $request->actual_finish;
        $fdt->rkap_rjpu = $request->rkap_rjpu;
        // if($fdt->upload_kajian && file_exists(storage_path('app/public/' . $fdt->upload_kajian)))
        // {
        //     \Storage::delete('public/'.$fdt->upload_kajian);
        // }
        // $upload_kajian = $request->file('upload_kajian')->store('files', 'public');
        // $fdt->upload_kajian = $upload_kajian;
        
        $fdt->save();
        return redirect('fdt');
    }

    public function destroy($id)
    {
        $fdt = Fdt::find($id);
        $fdt->delete();
        return redirect('fdt');
    }
}
