<?php

namespace App\Http\Controllers;

use App\model\mdBerita;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Str;
use Redirect;

class beritaControl extends Controller
{
    function index(Request $r)
    {
        $type = $r->get("type");
        if ($type == 'BeritaByHeadline') {
            return self::BeritaByHeadline($r);
        } elseif ($type == 'BeritaTrending') {
            return self::BeritaTrending($r);
        } elseif ($type == 'BeritaById') {
            return self::BeritaById($r);
        } elseif ($type == 'AddViewer') {
            return self::AddViewer($r);
        } elseif ($type == 'BeritaSort') {
            return self::BeritaSort($r);
        }
    }

    function BeritaByHeadline(Request $r)
    {
        $berita = mdBerita::with(['kategori', 'subkategori'])->where("headline", "true")
            ->orderBy("tgl_publish", "DESC")
            ->orderBy("jam", "DESC")
            ->limit("5")
            ->get();

        return $berita;
    }

    function BeritaTrending(Request $r)
    {
        $berita = mdBerita::with(['kategori', 'subkategori'])->orderBy("tgl_publish", "DESC")
            ->orderBy("jam", "DESC")
            ->limit("20")
            ->get();
        return $berita;
    }

    function BeritaById(Request $r)
    {
        $id = $r->get("id");
        $berita = mdBerita::with(['kategori', 'subkategori'])
            ->where("id_berita", $id)
            ->get();

        return $berita;
    }
    function detail(Request $r, $id, $judul)
    {

        $berita = mdBerita::where('id_berita', $id)->get();

        $urlLink = url()->full();
        $folder = date("Ymd", strtotime($berita[0]->tgl_publish));
        $description = Str::words($berita[0]->isi_berita, '30');
        // $gambarLink = url('/storage/Artikel_Thumbnail/'.$folder.'/'.$berita[0]->gambar);
        $gambarLink = 'http://inilahkepri.id/resources/Artikel_Thumbnail/' . $folder . '/' . $berita[0]->gambar;

        $seo = str_slug($berita[0]->judul, "-");
        $agent = new Agent();

        if ($agent->isMobile()) {
            return Redirect::to('https://m.inilahkepri.id/berita/' . $id . '/' . $seo);
        } else {
            return view('berita.detail', compact('id', 'berita', 'urlLink', 'description', 'gambarLink'));
        }
    }

    function oldToNew(Request $r, $judul, $id)
    {

        $berita = mdBerita::where('id_berita', $id)->get();

        $urlLink = url()->full();
        $folder = date("Ymd", strtotime($berita[0]->tgl_publish));
        $description = Str::words($berita[0]->isi_berita, '30');
        // $gambarLink = url('/storage/Artikel_Thumbnail/'.$folder.'/'.$berita[0]->gambar);
        $gambarLink = 'http://inilahkepri.id/resources/Artikel_Thumbnail/' . $folder . '/' . $berita[0]->gambar;

        $seo = str_slug($berita[0]->judul, "-");
        $agent = new Agent();

        if ($agent->isMobile()) {
            return Redirect::to('https://m.inilahkepri.id/berita/' . $id . '/' . $seo);
        } else {
            return view('berita.detail', compact('id', 'berita', 'urlLink', 'description', 'gambarLink'));
        }
    }

    function AddViewer(Request $r)
    {
        $id = $r->get("id");

        $berita = mdBerita::where("id_berita", $id)->get();
        //        
        $dibaca = $berita[0]->dibaca + 1;
        //        
        $a = array("dibaca" => $dibaca);
        //        
        return mdBerita::where("id_berita", $id)->update($a);
    }

    function BeritaSort(Request $r)
    {
        $start = date("Y-m-d", strtotime($r->get('sort')['date'][0]));
        $end = date("Y-m-d", strtotime($r->get('sort')['date'][1]));
        $kategori = $r->get("sort")["kategori"];

        if ($kategori == "all") {
            $berita = mdBerita::with(['kategori', 'subkategori'])->orderBy("tgl_publish", "DESC")
                ->whereBetween("tgl_publish", [$start, $end])
                ->orderBy("jam", "DESC")
                ->get();
            return $berita;
        } else {
            $berita = mdBerita::with('kategori')->orderBy("tgl_publish", "DESC")
                ->where('id_kategori', $kategori)
                ->whereBetween("tgl_publish", [$start, $end])
                ->orderBy("jam", "DESC")
                ->get();
            return $berita;
        }
    }
}
