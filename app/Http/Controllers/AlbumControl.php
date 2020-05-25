<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\mdAlbum;


class AlbumControl extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'BeritaByDate'){
            return self::BeritaByDate($r);
        }
    }
    
    function BeritaByDate(Request $r){
        $album = mdAlbum::all();
        return $album;
    }
}
