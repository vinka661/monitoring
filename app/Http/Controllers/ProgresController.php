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

    public function edit($id_fdt)
    {
        $progres = Progres::all();
        $fdt = Fdt::find($id_fdt);
        $pic = Pic::all();
        return view('progres.edit',['progres' => $progres,'fdt' => $fdt, 'pic' => $pic]);
    }

    public function update(Request $request, $id_fdt)
    {
        $progres = progres::find($id_fdt);
        $progres->id_fdt = $request->fdt;
        $progres->id_pic = $request->pic;
        $progres->tanggal = $request->tanggal;
        $progres->keterangan = $request->keterangan;
        
        $progres->save();
        return redirect('progres');
    }

    public function destroy($id)
    {
        $progres = progres::find($id);
        $rcfa->delete();
        return redirect('progres');
    }
}
