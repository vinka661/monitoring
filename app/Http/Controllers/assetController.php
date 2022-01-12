<?php

namespace App\Http\Controllers;
use App\Asset;
use App\Area;
use Illuminate\Http\Request;

class assetController extends Controller
{
    public function index()
    {
        $asset = Asset::all();
        return view('asset.index', ['asset' => $asset]);
    }

    public function create()
    {
        $area = Area::all();
        return view('asset.create', ['area' => $area]);
    }

    public function store(Request $request)
    {
        Asset::create([
            'asset_id' => $request->asset_id,
            'rbdid' => $request->rbdid,
            'equipment' => $request->equipment,
            'id_area' => $request->area,
        ]);
        return redirect('asset');
    }

    public function edit($asset_id)
    {
        $asset = Asset::find($asset_id);
        $area = Area::all();
        return view('asset.edit', ['asset' => $asset, 'area' => $area]);
    }

    public function update(Request $request, $asset_id)
    {
        $asset = Asset::find($asset_id);
        $asset->asset_id = $request->asset_id;
        $asset->rbdid = $request->rbdid;
        $asset->equipment = $request->equipment;
        $asset->id_area = $request->area;
        $asset->save();
        return redirect('asset');
    }

    public function destroy($id)
    {
        $asset = Asset::find($id);
        $asset->delete();
        return redirect('asset');
    }
}
