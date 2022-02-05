<?php

namespace App\Http\Controllers;
use App\Progres;
use App\Fdt;
use App\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProgresPicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
            if(Gate::allows('pic')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });   
    }

    public function index()
    {
        $progresPic = Progres::all();
        return view('halamanPic.progres.index', ['progresPic' => $progresPic]);
    }
    // public function detailProgres($fdt_id)
    // {
    //     $fdt = Fdt::find($fdt_id);
    //     $progres = Progres::where('id_fdt', '=', $fdt_id)->get();
    //     return view('progres.detailProgres', ['fdt' => $fdt, 'progres' => $progres]);
    // }

    public function edit($progres_id)
    {
        $progresPic = Progres::find($progres_id);
        $fdt = Fdt::all();
        $pic = Pic::all();
        return view('halamanPic.progres.edit',['progresPic' => $progresPic,'fdt' => $fdt, 'pic' => $pic]);
    }

    public function update(Request $request, $progres_id)
    {
        $progresPic = Progres::find($progres_id);
        $fdt = Fdt::all();
        $pic = Pic::all();
        $progresPic->tanggal_progres = $request->tanggal_progres;
        $progresPic->ket_progres = $request->ket_progres;
        // $progresPic->status = 2;
        $progresPic->save();
        return redirect()->route('pic_progres', ['fdt_id' => $progresPic->id_fdt, 'pic_id' => $progresPic->pic->nid])->with('success','Data Progres Berhasil Diedit');
    }

    public function finish(Request $request, $progres_id)
    {
        $progresPic = Progres::find($progres_id);
        $fdt = Fdt::all();
        $pic = Pic::all();
        $progresPic->status = 1;
        $progresPic->status = $request->status;
        $progresPic->save();
        // $progresPic = Progres::all();
        return redirect()->route('pic_progres', ['fdt_id' => $progresPic->id_fdt, 'pic_id' => $progresPic->pic->nid])->with('success','Data Progres Berhasil Diselesaikan');
    }
}