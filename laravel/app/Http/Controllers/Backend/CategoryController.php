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
        $fileName = "";

        if (!file_exists('uploads/category')) {
            mkdir('uploads/category', 0755, true);
        }
        $category = Category::find($request->input("id"));

        if ($request->hasFile('photo')) {
            @unlink('uploads/category/' . $category->photo);
            $file = $request->file('photo');
            $path = public_path() . '\uploads\category\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }

        $category->name = $request->input("name");
        $category->desp = $request->input("desp");
        $category->vw = $request->input("vw");
        $category->hot = $request->input("hot");
        $category->seq = $request->input("seq");

        if ($fileName)
            $category->photo = $fileName;
        $category->save();


        return redirect()->route('admin.category.index');
    }

    function getListWhere(array $request){

        

        $sql = DB::table('Category');

        if($request["name"] != ""){
            $sql->where('name', 'like', '%' .$request["name"] . '%');
        }

        if($request["vw"] != ""){
            if($request["vw"] != "2"){
                $sql->where('vw', '=',  $request["vw"]);
            } else {
                $sql->where('vw', '=',  0)->orWhere('vw', '=', "")->orWhereNull('vw');
            }
                
            
        }

        if($request["hot"] != ""){
            if($request["hot"] != "2"){
                $sql->where('hot', '=',  $request["hot"]);
            } else {
                $sql->where('hot', '=',  0)->orWhere('hot','=', "")->orWhereNull('hot');
            }
                
            
        }


        return $sql;
    }


    function getSearchArr($request){


        $req = array();
        $req["name"] = $request->input("name");
        $req["vw"] = $request->input("vw");
        $req["hot"] = $request->input("hot");

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

        $fileName = "";

        if (!file_exists('uploads/product')) {
            mkdir('uploads/product', 0755, true);
        }
        
        $category = new Category;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = public_path() . '\uploads\category\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }
        $category->name = $request->input("name");
        $category->desp = $request->input("desp");
        $category->vw = $request->input("vw");
        $category->hot = $request->input("hot");
        $category->seq = $request->input("seq");

        if ($fileName)
            $category->photo = $fileName;

        $category->save();

        return redirect()->route('admin.category.show', $category->id);
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
