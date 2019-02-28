<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class About extends Model
{
    protected $table = 'about';

    protected $appends = ['vw_str'];

    public function getVwStrAttribute()
    {   
        if($this->vw == "1"){
            return "Y";
        } else {
            return "N";
        }
    }


    //
}
