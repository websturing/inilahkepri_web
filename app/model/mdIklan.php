<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdIklan extends Model
{
    protected $table        = "iklan";
    protected $primaryKey   = "iklan_id";
    
    protected $appends = [
        'showOn',
    ];

    function getshowOnAttribute() {
        $ex = explode(",", $this->on_show);
        $b;    
      foreach($ex as $a){
          $b[] = array("slug" => $a);
      }
     return $b;
    }
    
    function iklanPosition(){
        return $this->hasMany(mdiklanDetail::class, 'iklan_id');
    }
}
