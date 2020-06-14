<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdBerita extends Model
{
    protected $table        = "berita";
    protected $primaryKey   = "id_berita";

    public $timestamps = false;

    protected $appends = [
        'Folder',
        'seo',
        'LinkTo'
    ];

    function getFolderAttribute()
    {
        $crypt = date("Ymd", strtotime($this->tgl_publish));
        return $crypt;
    }

    function getLinkToAttribute()
    {
        $seo = str_slug($this->judul, "-");
        return "/berita/" . $this->id_berita . "/" . $seo;
    }

    function getseoAttribute()
    {
        $crypt = str_slug($this->judul, "-");
        return $crypt;
    }
    function kategori()
    {
        return $this->belongsTo(mdKategori::class, 'id_kategori');
    }
    function subkategori()
    {
        return $this->belongsTo(mdsubkategori::class, "id_subkategori");
    }
}
