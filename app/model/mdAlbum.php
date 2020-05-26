<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdAlbum extends Model
{
    protected $table        = "tbAlbum";
    protected $primaryKey   = "id_album";
    
    protected $appends = [
        'LinkTo'
    ];
    
    function getLinkToAttribute(){
        $seo = str_slug($this->judul,"-");
        return "/album/".$this->id_album."/".$seo;
    }
    
    function gallery(){
        return $this->hasMany(mdGallery::class, 'id_album');
    }
}
