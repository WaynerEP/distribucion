<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class profileController extends Controller
{

    public function index()
    {
        return view('Profile.index');
    }


    public function edit_profile()
    {
        return view('Profile.EditProfile');
    }
}
