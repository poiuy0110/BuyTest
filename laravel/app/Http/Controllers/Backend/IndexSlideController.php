<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IndexSlide;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use DB;
use Illuminate\Support\Facades\Input;

class IndexSlideController extends Controller
{


    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;


    return view('backend.indexslide.index', compact('lists', 'req'));
    }


    public function create()
    {   

        
        return view('backend.indexslide.edit');     
    }


    public function edit($id="")
    {   
        if($id != ""){

            $indexslide = IndexSlide::find($id);
            return view('backend.indexslide.edit', compact('indexslide'));
        } else {
            return view('backend.indexslide.edit');
        }            
    }
    public function update(Request $request, $id)
    {      
        $fileName = "";

        /*if (!file_exists('uploads/indexslide')) {
            mkdir('uploads/indexslide', 0755, true);
        }*/
        $indexslide = IndexSlide::find($request->input("id"));

        if ($request->hasFile('photo')) {
            
            if ($request->hasFile('photo')) {
                $fileName = $this->fileUpload($indexslide, 'photo',  '\uploads\indexslide\\', $request);
            }
        }
        
        $indexslide->title = $request->input("title");
        $indexslide->url = $request->input("url");
        $indexslide->desp = $request->input("desp");
        $indexslide->vw = $request->input("vw");
        $indexslide->seq = $request->input("seq");

        if ($fileName)
            $indexslide->photo = $fileName;
        $indexslide->save();


        return redirect()->route('admin.indexslide.index');
    }

    function getListWhere(array $request){

        

        $sql = DB::table('Index_Slide');

        if($request["title"] != ""){
            $sql->where('title', 'like', '%' .$request["title"] . '%');
        }

        if($request["vw"] != ""){
            if($request["vw"] != "2"){
                $sql->where('vw', '=',  $request["vw"]);
            } else {
                $sql->where('vw', '=',  0)->orWhere('vw', '=', "")->orWhereNull('vw');
            }
                
            
        }




        return $sql;
    }


    function getSearchArr($request){


        $req = array();
        $req["title"] = $request->input("title");
        $req["vw"] = $request->input("vw");

        return $req;

    }

    public function destroy($id)
    {
        $indexslide = IndexSlide::find($id);
        $indexslide->delete();
        return redirect()->route('admin.indexslide.index');
    }


    public function show($id)
    {   
        $indexslide = IndexSlide::find($id);
        return view('backend.indexslide.show', compact('indexslide'));
           
    }

    public function store(Request $request)
    {   

        $fileName = "";

        
        
        $indexslide = new IndexSlide;
        if ($request->hasFile('photo')) {
            $fileName = $this->fileUpload($indexslide, 'photo',  '\uploads\indexslide\\', $request);
        }
        
        $indexslide->title = $request->input("title");
        $indexslide->url = $request->input("url");
        $indexslide->desp = $request->input("desp");
        $indexslide->vw = $request->input("vw");
        $indexslide->seq = $request->input("seq");

        if ($fileName)
            $indexslide->photo = $fileName;

        $indexslide->save();

        return redirect()->route('admin.indexslide.show', $indexslide->id);
    }






     
   



}
