<?php

namespace App\Http\Controllers;
use App\Pic;
use Illuminate\Http\Request;

class picController extends Controller
{
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
            'password' => $request->password,
            'bidang'   => $request->bidang,
            'fungsi'   => $request->fungsi,
            'level'    => $request->level,

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
        $pic->password = $request->password;
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
    
}
