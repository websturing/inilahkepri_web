<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class appControl extends Controller
{
    function index(){
        return view('welcome');
    }
}
