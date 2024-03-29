<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Redirect;

class appControl extends Controller
{
    function index()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
            return Redirect::to('https://m.inilahkepri.id');
        } else {
            return view('welcome');
        }
    }
    function inilahnews()
    {
        return view('berita.kategori');
    }
}
