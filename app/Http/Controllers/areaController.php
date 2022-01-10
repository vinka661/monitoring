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
        Area::insert([
            'nama' => $request->nama,
        ]);
        return redirect('area');
    }
}
