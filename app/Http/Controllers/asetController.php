<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Area;
use PDF;
class asetController extends Controller
{
    public function index()
    {
        $aset = Asset::all();
        return view('aset.index', ['aset' => $aset]);
    }

    public function create()
    {
        $area = Area::all();
        return view('aset.create', ['area' => $area]);
    }

    // public function create()
    // {
    //     $area = Area::all();
    //     return view('asset.create', ['area' => $area]);
    // }

    public function store(Request $request)
    {
        Asset::create([
            'asset_id' => $request->aset_id,
            'rbdid' => $request->rbdid,
            'equipment' => $request->equipment,
            'id_area' => $request->area,
        ]);
        return redirect('aset');
    }

    public function edit($aset_id)
    {
        $aset = Asset::find($aset_id);
        $area = Area::all();
        return view('aset.edit', ['aset' => $aset, 'area' => $area]);
    }

    public function update(Request $request, $aset_id)
    {
        $aset = Asset::find($aset_id);
        $aset->asset_id = $request->aset_id;
        $aset->rbdid = $request->rbdid;
        $aset->equipment = $request->equipment;
        $aset->id_area = $request->area;
        $aset->save();
        return redirect('aset');
    }

    public function destroy($id)
    {
        $aset = Asset::find($id);
        $aset->delete();
        return redirect('aset');
    }

    public function cetakAset(){
        $aset = Asset::all();
        $pdf = PDF::loadview('aset.cetakAset',['aset'=>$aset]);
        return $pdf->stream();
    }
}