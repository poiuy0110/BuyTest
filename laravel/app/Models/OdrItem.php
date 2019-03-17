<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class OdrItem extends Model
{
    //
    protected $table = 'odr_item';



    public function getProdNameAttribute() 
    {
        $this->attributes['prod_name'] =  DB::table('product')->select('name')->where('id', '=', $this->prod_id)->value('name');

        return $this->attributes['prod_name']; 
    }  



}
