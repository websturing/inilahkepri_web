<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\mdAlbum;
use Illuminate\Support\Str;


class AlbumControl extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'BeritaByDate'){
            return self::BeritaByDate($r);
        }
        elseif($type == 'AlbumById'){
            return self::AlbumById($r);
        }
    }
    
    function BeritaByDate(Request $r){
        $album = mdAlbum::all();
        return $album;
    }
    function AlbumById(Request $r){
        $album = mdAlbum::with(['gallery'])
                        ->where('id_album', $r->get("id"))
                        ->get();
        
        return $album;
        
    }
    
    
    function detail(Request $r, $id, $judul){
        
        $album = mdAlbum::where('id_album', $id)->get();
        
        

        $urlLink = url()->full();
        $folder = 'album';
        $description = Str::words($album[0]->deskripsi, '30');
        $gambarLink = 'http://inilahkepri.id/resources/album/'.$folder.'/'.$album[0]->foto;


        return view('album.detail', compact('id','album','urlLink','description','gambarLink'));
    }
}
