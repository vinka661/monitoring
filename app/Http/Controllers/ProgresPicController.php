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
        $progresPic->tanggal_progres = $request->tanggal_progres;
       
        
        $progresPic->save();
        return redirect('progresPic');
    }
}