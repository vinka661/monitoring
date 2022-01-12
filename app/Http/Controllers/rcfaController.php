<?php

namespace App\Http\Controllers;
use App\Asset;
use App\Rcfa;
use Illuminate\Http\Request;

class rcfaController extends Controller
{
    public function index()
    {
        $rcfa = Rcfa::all();
        return view('rcfa.index', ['rcfa' => $rcfa]);
    }

    public function create()
    {
        $rcfa = Rcfa::all();
        return view('rcfa.create', ['rcfa' => $rcfa]);
    }
}
