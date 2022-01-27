<?php

namespace App\Http\Controllers;
use App\Rcfa;
use App\FdtPic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class fdtPicController extends Controller
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
        $fdtPic = FdtPic::all();
        return view('halamanPic.fdt.index', ['fdtPic' => $fdtPic]);
    }
}
