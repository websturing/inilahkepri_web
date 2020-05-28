<?php

namespace App\Http\Controllers;

use App\model\mdBerita;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Str;
use Redirect;

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
        elseif($type == 'BeritaById'){
            return self::BeritaById($r);
        }
    }

    function BeritaByHeadline(Request $r){
        $berita = mdBerita::with('kategori')->where("headline", "true")
                            ->orderBy("tgl_publish","DESC")
                            ->orderBy("jam","DESC")
                            ->limit("5")
                            ->get();

        return $berita;
    }

    function BeritaTrending(Request $r){
        $berita = mdBerita::with('kategori')->orderBy("tgl_publish","DESC")
                            ->orderBy("jam","DESC")
                            ->limit("20")
                            ->get();
        return $berita;
    }

    function BeritaById(Request $r){
        $id = $r->get("id");
        $berita = mdBerita::with('kategori')
                        ->where("id_berita", $id)
                        ->get();

        return $berita;

    }
    function detail(Request $r, $id, $judul){
        
        $berita = mdBerita::where('id_berita', $id)->get();

        $urlLink = url()->full();
        $folder = date("Ymd", strtotime($berita[0]->tgl_publish));
        $description = Str::words($berita[0]->isi_berita, '30');
        // $gambarLink = url('/storage/Artikel_Thumbnail/'.$folder.'/'.$berita[0]->gambar);
        $gambarLink = 'http://inilahkepri.id/resources/Artikel_Thumbnail/'.$folder.'/'.$berita[0]->gambar;
        
         $seo = str_slug($berita[0]->judul,"-");    
        $agent = new Agent();
    
        if($agent->isMobile()){
            return Redirect::to('https://m.inilahkepri.id/berita/'.$id.'/'.$seo);
        }
        else{
            return view('berita.detail', compact('id','berita','urlLink','description','gambarLink'));
        }

        
    }
}
