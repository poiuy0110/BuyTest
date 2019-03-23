<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';


    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }


    public function store()
    {   
       
            return $this->belongsTo('App\Models\Store', 'store_id');
   
        
    }

}
