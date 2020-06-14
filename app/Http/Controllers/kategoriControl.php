<?php

namespace App\Http\Controllers;

use App\model\mdKategori;
use Illuminate\Http\Request;

class kategoriControl extends Controller
{
    function index(Request $r)
    {
        $type = $r->get("type");
        if ($type == 'kategoriAll') {
            return self::kategoriAll($r);
        }
    }

    function kategoriAll(Request $r)
    {
        return mdKategori::all();
    }
}
