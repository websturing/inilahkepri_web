<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Redirect;

class appControl extends Controller
{
    function index(){
        $agent = new Agent();
        
        if($agent->isMobile()){
            return Redirect::to('http://www.tukangketik.my.id/inilahkepri_mobile');
        }
        else{
            return view('welcome');
        }
        
        
    }
}
