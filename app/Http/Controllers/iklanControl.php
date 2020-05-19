<?php

namespace App\Http\Controllers;

use App\model\mdIklan;
use Illuminate\Http\Request;

class iklanControl extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'iklanByposition'){
            return self::iklanByposition($r);
        }
    }

    function iklanByposition(Request $r){
        $positon = $r->get("position");

        return mdIklan::where('position', $positon)
                    ->orderBy('number','DESC')
                    ->get();
    }
}
