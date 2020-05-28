<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdiklanDetail extends Model
{
    protected $table        = "iklan_detail";
    protected $primaryKey   = "iklan_detail_id";
    
    protected $appends = [
        'onShow',
    ];

    function getonShowAttribute() {
        $ex = explode(",", $this->show_on);
        $b;    
      foreach($ex as $a){
          $b[] = array("slug" => $a);
      }
     return $b;
    }
}
