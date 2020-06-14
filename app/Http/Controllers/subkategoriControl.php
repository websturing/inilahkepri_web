<?php

namespace App\Http\Controllers;

use App\model\mdsubkategori;
use Illuminate\Http\Request;

class subkategoriControl extends Controller
{
    function index(Request $r)
    {
        $type = $r->get("type");
        if ($type == 'subkategoriByKategori') {
            return self::subkategoriByKategori($r);
        } elseif ($type == 'subkategoriAll') {
            return self::subkategoriAll($r);
        }
    }


    function subkategoriByKategori(Request $r)
    {
        $kategori = $r->get('sort')['kategori'];

        return mdsubkategori::where("id_kategori", $kategori)->get();
    }
}
