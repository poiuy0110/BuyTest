<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\OdrItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use DB;

class OrdersController extends Controller
{


    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;

    /*foreach($lists as $row){
        $row->status_str = $this->getStatusStr($row->status);
        $row->pay_str = $this->getPayStr($row->pay_type);
        $row->ship_str = $this->getShipStr($row->ship_type);
    }*/




    return view('backend.orders.index', compact('lists', 'req'));
    }


    public function create()
    {   
        
        return view('backend.orders.edit');     
    }


    public function edit($id="")
    {   
        if($id != ""){

            $orders = Orders::find($id);
            return view('backend.orders.edit', compact('orders'));
        } else {
            return view('backend.orders.edit');
        }            
    }
    public function update(Request $request, $id)
    {      
        
        Orders::whereId($id)->update($request->except(['_method','_token']));
        return redirect()->route('admin.orders.show', $id);
    }

    function getListWhere(array $request){

        

        $sql = Orders::whereRaw('1 = 1');

        if($request["odr_no"] != ""){
            $sql->where('odr_no', '=', $request["odr_no"]);
        }

        if($request["s_date"] != ""){
            $sql->where('odr_date', '>=', $request["s_date"]);
        }

        if($request["e_date"] != ""){
            $sql->where('odr_date', '<=', $request["e_date"]);
        }

        if($request["login_id"] != ""){
            $sql->where('login_id', '=', $request["login_id"]);
        }

        if($request["status"] != ""){
            $sql->where('status', '=', $request["status"]);
        }

        


        return $sql;
    }


    function getSearchArr($request){


        $req = array();
        $req["odr_no"] = $request->input("odr_no");
        $req["s_date"] = $request->input("s_date");
        $req["e_date"] = $request->input("e_date");
        $req["login_id"] = $request->input("login_id");
        $req["status"] = $request->input("status");

        return $req;

    }

    public function destroy($id)
    {
        $orders = Orders::find($id);
        $orders->delete();
        return redirect()->route('admin.orders.index');
    }


    public function show($id)
    {   
        $orders = Orders::find($id);
        $lists = OdrItem::where('odr_id', '=', $id)->get();
        return view('backend.orders.show', compact(['orders','lists']));
           
    }

    public function store(Request $request)
    {   
        $data = $request->except(['_method','_token']);
        $id = Orders::insert($data)->id;

        return redirect()->route('admin.orders.show', $id);
    }



    function getStatusStr($status) 
    {
        switch ($status) {
            case '0':
                return "未結帳";   
                break;
            case '1':
                return "已結帳";   
                break;    
            case '2':
                return  "未出貨";   
                break; 
            case '3':
                return "已出貨";
                break; 
            case '4':
                return "退貨";
                break;     
             
            
        }
    }   


    public function itemCreate($odr_id)
    {   
        
        $odrItem = new OdrItem;

            
        $odrItem->odr_id = $odr_id;
        
        return view('backend.orders.itemEdit', compact('odrItem'));
    }

    public function itemStore(Request $request)
    {   
        $data = $request->except(['_method','_token']);
        OdrItem::insert($data);

        return redirect()->route('admin.orders.show', $request->input("odr_id"));
    }

    public function itemUpdate(Request $request, $id)
    {      
        
        OdrItem::whereId($id)->update($request->except(['_method','_token']));

        return redirect()->route('admin.orders.show', $request->input("odr_id"));
    }
    



}
