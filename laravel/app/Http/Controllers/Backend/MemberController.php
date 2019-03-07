<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use DB;

class MemberController extends Controller
{


    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;


    return view('backend.member.index', compact('lists', 'req'));
    }


    public function create()
    {   
        return view('backend.member.edit');     
    }


    public function edit($id="")
    {   
        if($id != ""){
            $member = Member::find($id);
            return view('backend.member.edit', compact('member'));
        } else {
            return view('backend.member.edit');
        }            
    }
    public function update(Request $request, $id)
    {   
        Member::whereId($id)->update($request->except(['_method','_token']));

        return redirect()->route('admin.member.index');
    }

    function getListWhere(array $request){

        

        $sql = DB::table('Member');

        //$sql->where('kind', '=', '主題活動');

        if($request["name"] != ""){
            $sql->where('name', 'like', '%' .$request["name"] . '%');
        }
        if($request["login_id"] != ""){
            $sql->where('login_id', 'like', '%' . $request["login_id"] . '%');
        }
        if($request["active"] != ""){
            if($request["active"] != "2"){
                $sql->where('active', '=',  $request["active"]);
            } else {
                $sql->where('active', '=',  0);
            }
                
            
        }


        return $sql;
    }


    function getSearchArr($request){


        $req = array();
        $req["name"] = $request->input("name");
        $req["login_id"] = $request->input("login_id");
        $req["active"] = $request->input("active");

        return $req;

    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('admin.member.index');
    }


    public function show($id)
    {   
        $member = Member::find($id);
        return view('backend.member.show', compact('member'));
           
    }

    public function store(Request $request)
    {   
        $data = $request->except(['_method','_token']);
        Member::insert($data);

        return redirect()->route('admin.member.index');

    }

    public function chgPass($id)
    {   
        
        //echo $id;
        $member = Member::find($id);
        return view('backend.member.chgPass', compact('member'));
           
    }

    public function chgPassSave(Request $request)
    {   

        $member = Member::find($request->input('id'));

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
        $validator->after(function($validator) use ($old_pass, $member) {
            if (!\Hash::check($old_pass, $member->password)) {
                $validator->errors()->add('old_pass', '原密碼錯誤');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator); //返回一次性錯誤
        }

        $member->password = bcrypt($password);
        $member->save();

        return redirect()->route('admin.member.index');

    }






     
    /*public function update(Request $request)
    {
        // 如果路徑不存在，就自動建立
    if (!file_exists('uploads/member')) {
        mkdir('uploads/member', 0755, true);
    }
    // 因為沒有特別建立create頁面，所以特別判斷資料庫中是否有資料可以更新
    $member = Member::find($request->input("id"));
    if (empty($member)) {
        // 沒有資料 -> 新增
        $member = new Member;
        $fileName = 'default.jpg';
    } 
    if ($request->hasFile('image')) {
        // 先刪除原本的圖片
        if ($member->image != 'default.jpg')
            @unlink('uploads/member/' . $member->image);
        $file = $request->file('image');
        $path = public_path() . '\uploads\member\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
    }
    $member->content = $request->input('content');
    if ($fileName)
        $member->image = $fileName;
    $member->save();
    return redirect()->route('admin.member.index');
    }*/



}
