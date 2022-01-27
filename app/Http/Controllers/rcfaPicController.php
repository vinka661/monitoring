<?php

namespace App\Http\Controllers;
use App\Asset;
use App\RcfaPic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class rcfaPicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
            if(Gate::allows('pic')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });   
    }

    public function index()
    {
        $rcfaPic = RcfaPic::all();
        return view('halamanPic.rcfa.index', ['rcfaPic' => $rcfaPic]);
    }

    // public function create()
    // {
    //     $aset = Asset::all();
    //     return view('rcfa.create', ['aset' => $aset]);
    // }
}