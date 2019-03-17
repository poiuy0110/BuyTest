<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Params;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use DB;
use Illuminate\Support\Facades\Input;

class ParamsController extends Controller
{


    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;


    return view('backend.params.index', compact('lists', 'req'));
    }


    public function create()
    {   

        
        return view('backend.params.edit');     
    }


    public function edit($id="")
    {   
        if($id != ""){

            $params = Params::find($id);
            return view('backend.params.edit', compact('params'));
        } else {
            return view('backend.params.edit');
        }            
    }
    public function update(Request $request)
    {      
        $id = $request->input("id");
        Params::whereId($id)->update($request->except(['_method','_token']));


        return redirect()->route('admin.params.index');
    }

    function getListWhere(array $request){

        

        $sql = DB::table('Params');

        if($request["id"] != ""){
            $sql->where('id', '=', $request["id"]);
        }

        if($request["is_edit"] != ""){
            if($request["is_edit"] != "2"){
                $sql->where('is_edit', '=',  $request["is_edit"]);
            } else {
                $sql->where('is_edit', '=',  0)->orWhere('is_edit', '=', "")->orWhereNull('is_edit');
            }
                
            
        }




        return $sql;
    }


    function getSearchArr($request){


        $req = array();
        $req["id"] = $request->input("id");
        $req["is_edit"] = $request->input("is_edit");

        return $req;

    }

    public function destroy($id)
    {
        $params = Params::find($id);
        $params->delete();
        return redirect()->route('admin.params.index');
    }




    public function store(Request $request)
    {   

        $data = $request->except(['_method','_token']);
        Params::insert($data);

        return redirect()->route('admin.params.index');
    }






     
   



}
