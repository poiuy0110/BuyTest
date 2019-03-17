<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use DB;

class StoreController extends Controller
{


    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;


    return view('backend.store.index', compact('lists', 'req'));
    }


    public function create()
    {   
        return view('backend.store.edit');     
    }


    public function edit($id="")
    {   
        if($id != ""){
            $store = Store::find($id);
            return view('backend.store.edit', compact('store'));
        } else {
            return view('backend.store.edit');
        }            
    }
    public function update(Request $request, $id)
    {   
        Store::whereId($id)->update($request->except(['_method','_token']));

        return redirect()->route('admin.store.index');
    }

    function getListWhere(array $request){

        

        $sql = DB::table('Store');

        //$sql->where('kind', '=', '主題活動');

        if($request["name"] != ""){
            $sql->where('name', 'like', '%' .$request["name"] . '%');
        }
        if($request["store_code"] != ""){
            $sql->where('store_code', '=', $request["store_code"] );
        }



        return $sql;
    }


    function getSearchArr($request){


        $req = array();
        $req["name"] = $request->input("name");
        $req["store_code"] = $request->input("store_code");

        return $req;

    }

    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect()->route('admin.store.index');
    }


    public function show($id)
    {   
        $store = Store::find($id);
        return view('backend.store.show', compact('store'));
           
    }

    public function store(Request $request)
    {   
        $data = $request->except(['_method','_token']);
        Store::insert($data);

        return redirect()->route('admin.store.index');

    }





}
