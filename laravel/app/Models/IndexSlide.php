<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndexSlide extends Model
{
    //
    protected $table = 'index_slide';

    function getPhotoPathAttribute(){
        return "/uploads/indexslide/".$this->photo;
    }

   


}
