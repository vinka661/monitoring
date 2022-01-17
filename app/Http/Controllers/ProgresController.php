<?php

namespace App\Http\Controllers;
use App\Progres;
use App\Fdt;
use App\Pic;
use Illuminate\Http\Request;

class ProgresController extends Controller
{
    public function index()
    {
        $progres = Progres::all();
        return view('progres.index', ['progres' => $progres]);
    }
    public function create()
    {
        $progres = Progres::all();
        $fdt = Fdt::all();
        $pic = Pic::all();
        // $rcfa = Rcfa::find($rcfa_id);
        // $aset = Asset::all();
        return view('progres.create', ['progres' => $progres]);
    }

    public function store(Request $request)
    {
        if($request->file('upload_kajian')){ 
			$upload_kajian = $request->file('upload_kajian')->store('files','public');
        }
        Progres::create([
            'id_fdt' => $request->id_fdt,
            'id_pic' => $request->id_pic,
            'progres' => $request->progres,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'upload_kajian' => $upload_kajian,
        ]);
        return redirect('progres');
    }
}
