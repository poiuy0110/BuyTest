<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use App\Models\Basket;
use App\Models\Orders;
use App\Models\OdrItem;
use App\Models\Params;
use DB;
use Auth;
use Redirect;   

class OrdersController extends Controller
{
    

 

    public function show($id)
    {   
        $cat_lists = $this->getFrontendCatLists();
        $orders = Orders::find($id);
        $lists = OdrItem::where("odr_id" ,"=", $id)->get();

        foreach($lists as $row){
            $row->oProduct = Product::find($row->prod_id);
        }



        return view('frontend.orders.ordersShow', compact('orders', 'cat_lists', 'lists'));
    }


   



}
