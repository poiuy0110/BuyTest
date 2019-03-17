<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';



    //protected $appends = ['status_str'];

    public function getStatusStrAttribute() 
    {
        switch ($this->status) {
            case '0':
                $this->attributes['status_str'] = "未結帳";
                return $this->attributes['status_str']; 
                break;
            case '1':
                $this->attributes['status_str'] = "已結帳";
                return $this->attributes['status_str'];   
                break;    
            case '2':
                $this->attributes['status_str'] = "未出貨";
                return  $this->attributes['status_str'];   
                break; 
            case '3':
                $this->attributes['status_str'] = "已出貨";
                return $this->attributes['status_str'];
                break; 
            case '4':
                $this->attributes['status_str'] = "退貨";
                return $this->attributes['status_str'];
                break;     
             
            
        }
    }   


    function getPayStrAttribute(){
        return "貨到付款";
    }

    function getShipStrAttribute(){
        return "宅配";
    }


}
