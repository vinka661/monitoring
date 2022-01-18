<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class berandaPicController extends Controller
{
    public function berandaPic()
    {
        return view('halamanPic.layout.master');
    }
}
