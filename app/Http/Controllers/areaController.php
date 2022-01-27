<?php

namespace App\Http\Controllers;
use App\Area;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class areaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
            if(Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });   
    }

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
            'nama_area' => $request->nama_area,
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
        $area->nama_area = $request->nama_area;
        $area->save();
        return redirect('area');
    }

    public function destroy($area_id)
    {
        $area = Area::find($area_id);
        $area->delete();
        return redirect('area');
    }

    public function cetakArea(){
        $area = Area::all();
        $pdf = PDF::loadview('area.cetakArea',['area'=>$area]);
        return $pdf->stream();
    }
}
