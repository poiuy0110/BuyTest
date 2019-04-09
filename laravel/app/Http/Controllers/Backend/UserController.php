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

        

        $sql = DB::table('users');

        if($request["title"] != ""){
            $sql->where('title', 'like', '%' .$request["title"] . '%');
        }
        if($request["user_id"] != ""){
            $sql->where('user_id', '=',  $request["user_id"] );
        }



        return $sql;
    }


    function getSearchArr($request){


        $req = array();
        $req["user_id"] = $request->input("user_id");
        $req["title"] = $request->input("title");

        return $req;

    }

    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }




    public function store(Request $request)
    {   



        $rules = [
            'password'=>'required|between:6,20|confirmed',
        ];
        $messages = [
            'required' => '密碼不能為空',
            'between' => '密碼必須是6~20位之間',
            'confirmed' => '新密碼和確認密碼不匹配'
        ];
        $data = $request->except(['_method','_token']);

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator); 
        } else {
            $data = $request->except(['_method','_token','password_confirmation']);
            $data['password'] = bcrypt($data['password']);

            user::insert($data);

            return redirect()->route('admin.user.index');


        }


       
    }


    public function show($id)
    {   
        if($id != ""){

            $user = user::find($id);
            return view('backend.user.show', compact('user'));
        }       
    }


    public function chgPass($id)
    {   
        if($id != ""){

            $user = user::find($id);
            return view('backend.user.chgPass', compact('user'));
        }       
    }



    public function chgPassSave(Request $request)
    {   
        $user = User::find($request->input('id'));

        $old_pass = $request->input('old_pass');
        $password = $request->input('password');
        $data = $request->except(['_method','_token']);

        $rules = [
            'old_pass'=>'required|between:6,20',
            'password'=>'required|between:6,20|confirmed',
        ];
        $messages = [
            'required' => '密碼不能為空',
            'between' => '密碼必須是6~20位之間',
            'confirmed' => '新密碼和確認密碼不匹配'
        ];
        $validator = Validator::make($data, $rules, $messages);
        $validator->after(function($validator) use ($old_pass, $user) {
            if (!\Hash::check($old_pass, $user->password)) {
                $validator->errors()->add('old_pass', '原密碼錯誤');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator); 
        }

        $user->password = bcrypt($password);
        $user->save();

        return redirect()->route('admin.user.index');
    }
     
   



}
