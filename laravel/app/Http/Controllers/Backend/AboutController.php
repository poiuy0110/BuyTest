<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use DB;

class AboutController extends Controller
{
    //

    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;


    



    return view('backend.about.index', compact('lists', 'req'));
    }




    public function edit($id="")
    {   
        if($id != ""){
            $about = About::find($id);
            return view('backend.about.edit', compact('about'));
        } else {
            return view('backend.about.edit');
        }            
    }
    public function update(Request $request)
    {   
        if($request->input("id") != ""){
            $about = About::find($request->input("id"));
        } else {
            $about = new About;
        }
        
        $about->kind = "關於我們";
        $about->post_date = $request->input("post_date");
        $about->title = $request->input("title");
        $about->subject = $request->input("subject");
        $about->desp = $request->input("desp");
        if($request->input("vw") != ""){
            $about->vw = $request->input("vw");
        } else {
            $about->vw = 0;
        }
        
        $about->save();

        return redirect()->route('admin.about.index');

    }

    function getListWhere(array $request){

        

        $sql = DB::table('About');

        $sql->where('kind', '=', '關於我們');

        if($request["title"] != ""){
            $sql->where('title', 'like', '%' .$request["title"] . '%');
        }
        if($request["desp"] != ""){
            $sql->where('desp', 'like', '%' . $request["desp"] . '%');
        }
        if($request["status"] != ""){
            if($request["status"] != "2"){
                $sql->where('vw', '=',  $request["status"]);
            } else {
                $sql->where('vw', '=',  0);
            }
                
            
        }


        return $sql;
    }


    function getSearchArr($request){


        $req = array();
        $req["title"] = $request->input("title");
        $req["desp"] = $request->input("desp");
        $req["status"] = $request->input("status");

        return $req;

    }

    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
        return redirect()->route('admin.about.index');
    }







     
    /*public function update(Request $request)
    {
        // 如果路徑不存在，就自動建立
    if (!file_exists('uploads/about')) {
        mkdir('uploads/about', 0755, true);
    }
    // 因為沒有特別建立create頁面，所以特別判斷資料庫中是否有資料可以更新
    $about = About::find($request->input("id"));
    if (empty($about)) {
        // 沒有資料 -> 新增
        $about = new About;
        $fileName = 'default.jpg';
    } 
    if ($request->hasFile('image')) {
        // 先刪除原本的圖片
        if ($about->image != 'default.jpg')
            @unlink('uploads/about/' . $about->image);
        $file = $request->file('image');
        $path = public_path() . '\uploads\about\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
    }
    $about->content = $request->input('content');
    if ($fileName)
        $about->image = $fileName;
    $about->save();
    return redirect()->route('admin.about.index');
    }*/



}
