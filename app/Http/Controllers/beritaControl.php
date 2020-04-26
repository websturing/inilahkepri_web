<?php

namespace App\Http\Controllers;

use App\model\mdBerita;
use Illuminate\Http\Request;

class beritaControl extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'BeritaByHeadline'){
            return self::BeritaByHeadline($r);
        }
        elseif($type == 'BeritaTrending'){
            return self::BeritaTrending($r);
        }
    }

    function BeritaByHeadline(Request $r){
        $berita = mdBerita::where("headline", "true")
                            ->orderBy("tgl_publish","DESC")
                            ->orderBy("jam","DESC")
                            ->limit("5")
                            ->get();

        return $berita;
    }

    function BeritaTrending(Request $r){
        $berita = mdBerita::orderBy("tgl_publish","DESC")
                            ->orderBy("jam","DESC")
                            ->limit("10")
                            ->get();
        return $berita;
    }
}
