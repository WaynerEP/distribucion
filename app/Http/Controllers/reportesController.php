<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportesController extends Controller
{
    public function reportPDF()
    {
        return view('home');
    }
    public function reportEXCEL()
    {
        return view('home');
    }
}
