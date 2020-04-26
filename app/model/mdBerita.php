<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdBerita extends Model
{
    protected $table        = "berita";
    protected $primaryKey   = "id_berita";

    protected $appends = [
        'Folder'
    ];

    function getFolderAttribute() {
        $crypt = date("Ymd", strtotime($this->tgl_publish));
        return $crypt;
    }
}
