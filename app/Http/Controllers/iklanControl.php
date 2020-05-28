<?php

namespace App\Http\Controllers;

use App\model\mdIklan;
use Illuminate\Http\Request;

class iklanControl extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'iklanByDevice'){
            return self::iklanByDevice($r);
        }
    }

    function iklanByDevice(Request $r){
        $web = $r->get("web");

        return mdIklan::with(['iklanPosition' => function($i){
                            $i->orderBy('order','ASC');
                        }])
                    ->get();
    }
}
