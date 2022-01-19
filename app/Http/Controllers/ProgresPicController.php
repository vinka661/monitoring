<?php

namespace App\Http\Controllers;
use App\Progres;
use App\Fdt;
use App\Pic;
use Illuminate\Http\Request;

class ProgresPicController extends Controller
{
    public function index()
    {
        $progresPic = Progres::all();
        return view('halamanPic.progres.index', ['progresPic' => $progresPic]);
    }

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
        $progresPic->tanggal = $request->tanggal;
       
        
        $progresPic->save();
        return redirect('progresPic');
    }
}
