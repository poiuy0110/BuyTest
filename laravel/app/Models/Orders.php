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


    public function getProdNameAttribute() 
    {
        $this->attributes['prod_name'] =  DB::table('product')
        ->select(DB::raw(
            " NANE as prod_name"
        ))->where('id', '=', $this->prod_id)->get();
    }  



    public function createNo() 
    {
        $latestOrder = Orders::orderBy('created_at','DESC')->first();
        return '#'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
    }  



}
