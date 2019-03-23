<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use DB;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        
    $req = $this -> getSearchArr($request);
    
    $sql = $this -> getListWhere($req);
    $arr = $sql->orderBy('id', 'desc')->paginate(10)->appends($req);
    $lists = $arr;


    return view('backend.product.index', compact('lists', 'req'));

  


    }


    public function create()
    {   
        $store_lists = $this->getStoreLists();
        $cat_lists = $this->getCatLists();
        
        return view('backend.product.edit', compact(['cat_lists', 'store_lists']));     
    }


    public function edit($id="")
    {   
        if($id != ""){

            $store_lists = $this->getStoreLists();
            $cat_lists = $this->getCatLists();
            $product = Product::find($id);
            return view('backend.product.edit', compact(['product', 'cat_lists','store_lists']));
        } else {
            return view('backend.product.edit');
        }            
    }
    public function update(Request $request, $id)
    {      
        $fileName = "";

        /*if (!file_exists('uploads/product')) {
            mkdir('uploads/product', 0755, true);
        }*/
        $product = Product::find($request->input("id"));

        if ($request->hasFile('photo')) {
            
            if ($request->hasFile('photo')) {
                $fileName = $this->fileUpload($product, 'photo',  '\uploads\product\\', $request);
            }
        }
        
        $product->cat_id = $request->input("cat_id");
        $product->name = $request->input("name");
        $product->desp = $request->input("desp");
        $product->vw = $request->input("vw");
        $product->hot = $request->input("hot");
        $product->qty = $request->input("qty");
        $product->new = $request->input("new");
        $product->store_id = $request->input("store_id");
        $product->price = $request->input("price");

        if ($fileName)
            $product->photo = $fileName;
        $product->save();


        return redirect()->route('admin.product.index');
    }

    function getListWhere(array $request){

        

        $sql = Product::with('store','category');

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

        if($request["new"] != ""){
            if($request["new"] != "2"){
                $sql->where('new', '=',  $request["new"]);
            } else {
                $sql->where('new', '=',  0)->orWhere('new','=', "")->orWhereNull('new');
            }
                
            
        }


        return $sql;
    }


    function getSearchArr($request){


        $req = array();
        $req["name"] = $request->input("name");
        $req["vw"] = $request->input("vw");
        $req["hot"] = $request->input("hot");
        $req["new"] = $request->input("new");

        return $req;

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.product.index');
    }


    public function show(Request $request)
    {   $id = $request->input("id");
        $product = Product::find($id);
        return view('backend.product.show', compact('product'));
           
    }

    public function store(Request $request)
    {   

        $fileName = "";

        
        
        $product = new Product;
        if ($request->hasFile('photo')) {
            $fileName = $this->fileUpload($product, 'photo',  '\uploads\product\\', $request);
        }
        $product->cat_id = $request->input("cat_id");
        $product->name = $request->input("name");
        $product->desp = $request->input("desp");
        $product->vw = $request->input("vw");
        $product->hot = $request->input("hot");
        $product->new = $request->input("new");
        $product->qty = $request->input("qty");
        $product->price = $request->input("price");
        $product->store_id = $request->input("store_id");

        if ($fileName)
            $product->photo = $fileName;

        $product->save();

        return redirect()->route('admin.product.show', $product->id);
    }



    function getCatLists(){

        $sql = DB::table('Category');
        $sql->where('vw', '=', "1");
        $sql->orderBy('seq', 'desc');
        $cat_lists = $sql->get();

        return $cat_lists;

    }

    function getStoreLists(){

        $sql = DB::table('Store');
        $sql->where('active', '=', "1");
        $sql->orderBy('id');
        $store_lists = $sql->get();

        return $store_lists;

    }
    

    function getPrice(){

        $id = Input::get('prod_id');
        $product = Product::find($id);

        echo $product->price;


    }




     
    /*public function update(Request $request)
    {
        // 如果路徑不存在，就自動建立
    if (!file_exists('uploads/product')) {
        mkdir('uploads/product', 0755, true);
    }
    // 因為沒有特別建立create頁面，所以特別判斷資料庫中是否有資料可以更新
    $product = Product::find($request->input("id"));
    if (empty($product)) {
        // 沒有資料 -> 新增
        $product = new Product;
        $fileName = 'default.jpg';
    } 
    if ($request->hasFile('image')) {
        // 先刪除原本的圖片
        if ($product->image != 'default.jpg')
            @unlink('uploads/product/' . $product->image);
        $file = $request->file('image');
        $path = public_path() . '\uploads\product\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
    }
    $product->content = $request->input('content');
    if ($fileName)
        $product->image = $fileName;
    $product->save();
    return redirect()->route('admin.product.index');
    }*/



}
