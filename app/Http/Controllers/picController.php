<?php

namespace App\Http\Controllers;
use App\Pic;
use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class picController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
            if(Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });   
    }

    public function index()
    {
        $pic = Pic::all();
        return view('pic.index', ['pic' => $pic]);
    }

    // public function create()
    // {
    //     return view('pic.create');
    // }

    public function create()
    {
        return view('pic.create');
    }

    public function store(Request $request)
    {
        Pic::create([
            'nid'      => $request->nid,
            'nama'     => $request->nama,
            'password' => Hash::make($request->password),
            'bidang'   => $request->bidang,
            'fungsi'   => $request->fungsi,
            'level'    => $request->level,

        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->nid . '@mail.com',
            'password' => Hash::make($request->password),
            'roles' => $request->level
        ]);

        return redirect('pic')->with('success', 'created successfully.');
    }

    public function edit($pic_id)
    {
        $pic = Pic::find($pic_id);
        return view('pic.edit', ['pic' => $pic]);
    }

    public function update(Request $request, $pic_id)
    {
        $pic = Pic::find($pic_id);
        $pic->nid = $request->nid;
        $pic->nama = $request->nama;
        $pic->password = Hash::make($request->password);
        $pic->bidang = $request->bidang;
        $pic->fungsi = $request->fungsi;
        $pic->level = $request->level;
        $pic->save();
        return redirect('pic');
    }

    public function destroy($pic_id)
    {
        $pic = Pic::find($pic_id);
        $pic->delete();
        return redirect('pic');
    }
    
    public function cetakPic(){
        $pic = Pic::all();
        $pdf = PDF::loadview('pic.cetakPic',['pic'=>$pic]);
        return $pdf->stream();
    }
}
