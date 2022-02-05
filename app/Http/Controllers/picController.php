<?php

namespace App\Http\Controllers;
use App\Pic;
use App\User;
use PDF;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Gate;

class picController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

        return redirect('pic')->with('success','Data PIC berhasil ditambahkan');
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
        return redirect('pic')->with('success','Data PIC berhasil diedit');
    }

    public function destroy($pic_id)
    {
        $pic = Pic::find($pic_id);
        $pic->delete();
        return redirect('pic')->with('success','Data PIC berhasil dihapus');
    }
    
    public function cetakPic(){
        $pic = Pic::all();
        $pdf = PDF::loadview('pic.cetakPic',['pic'=>$pic]);
        return $pdf->stream();
    }

    public function indexRcfa($id)
    {
        $pic = DB::table('pics as ps')
        ->join('progress as gs', 'gs.id_pic','=','ps.pic_id')
        ->join('fdts as fs', 'fs.fdt_id','=','gs.id_fdt')
        ->join('rcfas as rs', 'rs.rcfa_id','=','fs.id_rcfa')
        ->select('rs.rcfa_id as rcfa_id', 'rs.keterangan', 'rs.tanggal', 'ps.*')
        ->where('ps.nid',$id)
        ->distinct()
        ->get();
        return view('halamanPic.rcfa.index',compact('pic'));
    }

    public function indexFdt($id,$pic_id)
    {
        // SELECT * FROM fdts 
        // JOIN rcfas on rcfas.rcfa_id= fdts.id_rcfa
        // JOIN progress on fdts.fdt_id = progress.id_fdt
        // JOIN pics on progress.id_pic=pics.pic_id
        // where id_rcfa = 17 AND pics.nid = 'N222';
$pic = DB::table('fdts as fs')
->join('rcfas as rf','rf.rcfa_id', '=','fs.id_rcfa')
->join('progress as gs','fs.fdt_id', '=','gs.id_fdt')
->join('pics as ps','gs.id_pic', '=','ps.pic_id')
->where('id_rcfa',$id,) 
->where('ps.nid',$pic_id)
->distinct()
->get();

        // $pic = DB::table('pics as ps')
        // ->join('progress as gs', 'gs.id_pic','=','ps.pic_id')
        // ->join('fdts as fs', 'fs.fdt_id','=','gs.id_fdt')
        // ->select('fs.fdt_id as fdt_id', 'fs.nama_fdt', 'fs.target', 'ps.*')
        // ->where('ps.nid',$id)
        // ->distinct()
        // ->get();
        return view('halamanPic.fdt.index',compact('pic'));
        // ambll data dengan parameter id rcfa dan id pic
        // output fdt
    }

    public function indexProgres($fdt_id,$pic_id)
    {
        $progresPic = DB::table('pics as ps')
                ->join('progress as gs', 'gs.id_pic','=','ps.pic_id')
                ->join('fdts as fs', 'fs.fdt_id','=','gs.id_fdt')
                ->select('gs.progres_id as progres_id', 'ps.nama', 'gs.nama_progres', 'gs.tanggal_target', 'gs.ket_progres', 'gs.tanggal_progres', 'ps.*')
                ->where('id_fdt', $fdt_id)
                ->where('ps.nid', $pic_id)
                ->distinct()
                ->get();
                return view('halamanPic.progres.index',compact('progresPic'));
    }
}
