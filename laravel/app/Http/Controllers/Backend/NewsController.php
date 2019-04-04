<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use DB;

class NewsController extends Controller
{
    //

    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;

    /*foreach($lists as $row){
        $row->vw_str = $this -> transToStr($row->vw);
    }*/

    return view('backend.news.index', compact('lists', 'req'));
    }


    public function create()
    {   
        return view('backend.news.edit');     
    }


    public function edit($id="")
    {   
        if($id != ""){
            $news = About::find($id);
            return view('backend.news.edit', compact('news'));
        } else {
            return view('backend.news.edit');
        }            
    }
    public function update(Request $request)
    {   
        if($request->input("id") != ""){
            $news = About::find($request->input("id"));
        } else {
            $news = new About;
        }

        if (!file_exists('uploads/news')) {
            mkdir('uploads/news', 0755, true);
        }
        
        $news->kind = "主題活動";
        $news->post_date = $request->input("post_date");
        $news->title = $request->input("title");
        $news->subject = $request->input("subject");
        $news->desp = $request->input("desp");
        if($request->input("vw") != ""){
            $news->vw = $request->input("vw");
        } else {
            $news->vw = 0;
        }

        if ($request->hasFile('photo')) {
            @unlink('uploads/news/' . $news->photo);
            $file = $request->file('photo');
            $path = public_path() . '\uploads\news\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }

        if ($fileName)
            $news->photo = $fileName;


        
        $news->save();

        return redirect()->route('admin.news.index');

    }

    function getListWhere(array $request){

        

        $sql = DB::table('About');

        $sql->where('kind', '=', '主題活動');

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
        $news = About::find($id);
        $news->delete();
        return redirect()->route('admin.news.index');
    }


    public function show($id)
    {   
        $news = About::find($id);
        return view('backend.news.show', compact('news'));
           
    }

    public function store(Request $request)
    {   

        $about = new About;
 
        
        $about->kind = "主題活動";
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

        return redirect()->route('admin.news.index');

    }


     
    /*public function update(Request $request)
    {
        // 如果路徑不存在，就自動建立
    if (!file_exists('uploads/news')) {
        mkdir('uploads/news', 0755, true);
    }
    // 因為沒有特別建立create頁面，所以特別判斷資料庫中是否有資料可以更新
    $news = About::find($request->input("id"));
    if (empty($news)) {
        // 沒有資料 -> 新增
        $news = new About;
        $fileName = 'default.jpg';
    } 
    if ($request->hasFile('image')) {
        // 先刪除原本的圖片
        if ($news->image != 'default.jpg')
            @unlink('uploads/news/' . $news->image);
        $file = $request->file('image');
        $path = public_path() . '\uploads\news\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
    }
    $news->content = $request->input('content');
    if ($fileName)
        $news->image = $fileName;
    $news->save();
    return redirect()->route('admin.news.index');
    }*/



}
