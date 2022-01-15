<?php

namespace App\Http\Controllers;
use App\Area;

use Illuminate\Http\Request;

class areaController extends Controller
{
    public function area()
    {
        return view('area.index');
    }

    public function index()
    {
        $area = Area::all();
        return view('area.index', ['area' => $area]);
    }
    public function create()
    {
        return view('area.create');
    }

    public function store(Request $request)
    {
        Area::create([
            'nama' => $request->nama,
        ]);
        return redirect('area')->with('success', 'created successfully.');
    }
    
    public function edit($area_id)
    {
        $area = Area::find($area_id);
        return view('area.edit', ['area' => $area]);
    }

    public function update(Request $request, $area_id)
    {
        $area = Area::find($area_id);
        $area->nama = $request->nama;
        $area->save();
        return redirect('area');
    }

    public function destroy($area_id)
    {
        $area = Area::find($area_id);
        $area->delete();
        return redirect('area');
    }
}
