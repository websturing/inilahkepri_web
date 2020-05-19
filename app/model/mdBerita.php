<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdBerita extends Model
{
    protected $table        = "berita";
    protected $primaryKey   = "id_berita";

    protected $appends = [
        'Folder',
        'seo'
    ];

    function getFolderAttribute() {
        $crypt = date("Ymd", strtotime($this->tgl_publish));
        return $crypt;
    }
    function getseoAttribute() {
        $crypt = str_slug($this->judul,"-");
        return $crypt;
    }
    function kategori(){
        return $this->belongsTo(mdKategori::class, 'id_kategori');
    }
}
