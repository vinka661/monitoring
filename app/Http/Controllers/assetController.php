<?php

namespace App\Http\Controllers;
use App\Asset;
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
        return view('asset.create');
    }

    public function store(Request $request)
    {
        Asset::create([
            'area_id' => $request->area,
            'rbdid' => $request->area,
        ]);
        return redirect('area')->with('success', 'created successfully.');
    }
}
