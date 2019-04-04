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
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    

    public function prodLists($cat_id, $store_id="")
    {   

        //echo $cat_id;

        $cate = Category::find($cat_id);

        $cat_lists = $this->getFrontendCatLists();
        
        $store_lists =  DB::select('select distinct store_id from `product`  where cat_id='.$cat_id);
        foreach($store_lists as $row2){
            $row2->name = DB::table('store')->where('id', $row2->store_id)->value('name');
        }  

        $sql = Product::where("cat_id","=",$cat_id);

        if($store_id != ""){
            $sql->where('store_id', '=',  $store_id); 
        }

        $sql->orderBy('id', 'desc');

        $lists = $sql->get();

        return view('frontend.product.prodLists', compact('cate', 'store_lists','cat_lists','lists'));
    }


    public function prodShow($id)
    {   

        

       

        $cat_lists = $this->getFrontendCatLists();

        $product = Product::find($id);

        //print_r($id);
        
        $cate = Category::find($product->cat_id);
        $store = Store::find($product->store_id);
        
        

        return view('frontend.product.prodShow', compact('cate', 'product','store','cat_lists'));
    }


    function addToBasket(Request $request){

        $token =  session()->get('_token');
        $oBasket = Basket::where("token", "=", $token)->where("prod_id", "=", $request->input("prod_id"))->where("token", "=", $token)->first();

        if($oBasket == null){
            $oBasket = new Basket;
            $oBasket->qty = 1;
        } else {
            $oBasket->qty = $oBasket->qty  + 1;
        }


        $oProduct = Product::find($request->input("prod_id"));


        $oBasket->token = $token;
        $oBasket->prod_id = $request->input("prod_id");
        $oBasket->member_id =  Auth::guard('frontend')->id();
        $oBasket->amount = $oBasket->qty * $oProduct->price;
        $oBasket->price = $oProduct->price;
        $oBasket->save();


        return Redirect::to('product/basketShow');
       
    }



    function basketShow(){

        $token =  session()->get('_token');
        $mem_id = Auth::guard('frontend')->id();

        $sql = Basket::where("token", "=", $token)->whereNull('odr_id');

        if(!empty($mem_id)){
            $sql->orWhere("member_id", "=", $mem_id)->whereNull('odr_id');
        }


        $lists = $sql->get();
        $amount = 0;
        $total = 0;

        foreach($lists as $row){
            $row->oProduct = Product::find($row->prod_id);
            $amount += $row->amount;
            $total += $row->amount;
        }


        $count = count($lists);

        $shipping = Params::find("SHIPPING");
        if($count > 0){
            $total += $shipping->value;
        } else {
            $shipping->value = 0;
        }
        

        $cat_lists = $this->getFrontendCatLists();


        return view('frontend.product.basketShow', compact('lists','cat_lists','shipping','total','amount','count'));

    }
    
    
    function deleteBasket($id){

        $oBasket = Basket::find($id);
        $oBasket->delete();

        return Redirect::to('product/basketShow');
    }


    function checkout(Request $request){

        $rules = [
            'name' => 'required',
            'mobile' => 'required',
            'city' => 'required',
            'town' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'email' => 'required',
            'ship_to' => 'required',
            'ship_mobile' => 'required',
            'ship_city' => 'required',
            'ship_town' => 'required',
            'ship_zipcode' => 'required',
            'ship_address' => 'required'    
        ];
        
        $messages = [
            'name.required' => "請輸入姓名!",
            'mobile.required' => "請輸入電話!",
            'city.required' => "請輸入縣市!",
            'town.required' => "請輸入鄉鎮市區!",
            'zipcode.required' => "請輸入郵遞區號!",
            'address.required' => "請輸入地址!",
            'email.required' => "請輸入Email!",
            'ship_to.required' => "請輸入收件人!",
            'ship_mobile.required' => "請輸入收件人電話!",
            'ship_city.required' => "請輸入收件縣市!",
            'ship_town.required' => "請輸入收件鄉鎮市區!",
            'ship_zipcode.required' => "請輸入收件郵遞區號!",
            'ship_address.required' => "請輸入收件地址!"    
        ];


    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->passes()) {
        $odr_id = $this->createOrders($request);

        foreach($request->input("ids") as $id){
            $oBasket = Basket::find($id);
            $oOdrItem = new OdrItem;
            $oOdrItem->odr_id = $odr_id;
            $oOdrItem->prod_id = $oBasket->prod_id;
            $oProduct = Product::find($oBasket->prod_id);
            $oOdrItem->prod_cat = $oProduct->cat_id;
            $oOdrItem->prod_name = $oProduct->name;
            $oOdrItem->amount = $request->input("amount_".$id);
            $oOdrItem->qty = $request->input("qty_".$id);
            $oOdrItem->price = $request->input("price_".$id);
            $oOdrItem->save();

            $oBasket->odr_id = $odr_id;
            $oBasket->save();
        }

    } else {

        return Redirect::to('product/basketShow')->withErrors($validator);

    }


       
    }



    function createOrders($request){


        $mem_id = Auth::guard('frontend')->id();

        $oOrders = new Orders;
        $oOrders->odr_no =  $oOrders->createNo();
        $oOrders->odr_date = date("Y-m-d");
        $oOrders->mem_id = $mem_id;

        if(!empty($mem_id)){
            $oMember = Member::find($mem_id);
            $oOrders->login_id = $oMember->login_id;
            $oOrders->mem_name = $oMember->name;
        }

        $oOrders->bill_to = $request->input("name");
        $oOrders->bill_mobile = $request->input("mobile");
        $oOrders->bill_address = $request->input("address");
        $oOrders->bill_zipcode = $request->input("zipcode");
        $oOrders->bill_town = $request->input("town");
        $oOrders->bill_city = $request->input("city");
        $oOrders->bill_email = $request->input("email");

        $oOrders->ship_to = $request->input("ship_to");
        $oOrders->ship_mobile = $request->input("ship_mobile");
        $oOrders->ship_address = $request->input("ship_address");
        $oOrders->ship_zipcode = $request->input("ship_zipcode");
        $oOrders->ship_town = $request->input("ship_town");
        $oOrders->ship_city = $request->input("ship_city");
        $oOrders->ship_email = $request->input("ship_email");
        $oOrders->status = 0;


        $oOrders->shipping = $request->input("shipping");
        $oOrders->amount = $request->input("amount");
        $oOrders->total = $request->input("total");
        $oOrders->save();

        return $oOrders->id;


    }




}
