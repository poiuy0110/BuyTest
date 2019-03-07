<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use DB;

class CategoryController extends Controller
{


    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;


    return view('backend.category.index', compact('lists', 'req'));
    }


    public function create()
    {   
        return view('backend.category.edit');     
    }


    public function edit($id="")
    {   
        if($id != ""){
            $category = Category::find($id);
            return view('backend.category.edit', compact('category'));
        } else {
            return view('backend.category.edit');
        }            
    }
    public function update(Request $request, $id)
    {   
        Category::whereId($id)->update($request->except(['_method','_token']));

        return redirect()->route('admin.category.index');
    }

    function getListWhere(array $request){

        

        $sql = DB::table('Category');

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
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category.index');
    }


    public function show($id)
    {   
        $category = Category::find($id);
        return view('backend.category.show', compact('category'));
           
    }

    public function store(Request $request)
    {   
        $data = $request->except(['_method','_token']);
        Category::insert($data);

        return redirect()->route('admin.category.index');

    }

    public function chgPass($id)
    {   
        
        //echo $id;
        $category = Category::find($id);
        return view('backend.category.chgPass', compact('category'));
           
    }

    public function chgPassSave(Request $request)
    {   

        $category = Category::find($request->input('id'));

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
        $validator->after(function($validator) use ($old_pass, $category) {
            if (!\Hash::check($old_pass, $category->password)) {
                $validator->errors()->add('old_pass', '原密碼錯誤');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator); //返回一次性錯誤
        }

        $category->password = bcrypt($password);
        $category->save();

        return redirect()->route('admin.category.index');

    }






     
    /*public function update(Request $request)
    {
        // 如果路徑不存在，就自動建立
    if (!file_exists('uploads/category')) {
        mkdir('uploads/category', 0755, true);
    }
    // 因為沒有特別建立create頁面，所以特別判斷資料庫中是否有資料可以更新
    $category = Category::find($request->input("id"));
    if (empty($category)) {
        // 沒有資料 -> 新增
        $category = new Category;
        $fileName = 'default.jpg';
    } 
    if ($request->hasFile('image')) {
        // 先刪除原本的圖片
        if ($category->image != 'default.jpg')
            @unlink('uploads/category/' . $category->image);
        $file = $request->file('image');
        $path = public_path() . '\uploads\category\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
    }
    $category->content = $request->input('content');
    if ($fileName)
        $category->image = $fileName;
    $category->save();
    return redirect()->route('admin.category.index');
    }*/



}
