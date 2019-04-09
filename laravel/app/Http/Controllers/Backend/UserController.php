<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use DB;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{


    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;


    return view('backend.user.index', compact('lists', 'req'));
    }


    public function create()
    {   

        
        return view('backend.user.create');     
    }


    public function edit($id="")
    {   
        if($id != ""){

            $user = user::find($id);
            return view('backend.user.edit', compact('user'));
        } else {
            return view('backend.user.edit');
        }            
    }
    public function update(Request $request)
    {      
        $id = $request->input("id");
        user::whereId($id)->update($request->except(['_method','_token']));


        return redirect()->route('admin.user.index');
    }

    function getListWhere(array $request){

        

        $sql = DB::table('user');



        return $sql;
    }



    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }




    public function store(Request $request)
    {   

        $data = $request->except(['_method','_token']);
        user::insert($data);

        return redirect()->route('admin.user.index');
    }






     
   



}
