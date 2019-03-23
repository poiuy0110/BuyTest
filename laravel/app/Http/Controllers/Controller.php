<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
// /use App\Models\Product;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function uploadImageContent()
    {
        $this->validate(request(), [
            'upload' => 'mimes:jpeg,jpg,gif,png'
        ]);

        $file = request()->file('upload');
        $filename = $file->getClientOriginalName();

        $year = Carbon::now()->year;
        $imagePath = "/uploads/about/{$year}/";

        if (file_exists(public_path($imagePath) . $filename)) {
            $filename = Carbon::now()->timestamp . '.' . $filename;
        }

        $file->move(public_path() . $imagePath, $filename);

        $url = $imagePath . $filename;

        echo "<script>window.parent.CKEDITOR.tools.callFunction(1,'{$url}','')</script>";
    
    }


    public function transToStr($val){

        if($val == "1"){
            return "<span class='badge badge-success'>Y</span>";
        } else {
            return "<span class='badge badge-danger'>N</span>";
        }
    }

function fileUpload($obj, $file_name, $path, $request){


    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }

    if ($request->hasFile($file_name)) {
        @unlink('uploads/product/' . $obj->photo);
        $file = $request->file($file_name);
        $path = public_path() . $path;
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
    }

    //echo $fileName;


    return $fileName;

}


function getFrontendCatLists(){

    $cat_lists = DB::select('select distinct cat_id from `product` ');

    foreach($cat_lists as $row){

        $row->name = DB::table('category')->where('id', $row->cat_id)->value('name');
        $row->store_lists =  DB::select('select distinct store_id from `product`  where cat_id='.$row->cat_id);
        foreach($row->store_lists as $row2){
            $row2->name = DB::table('store')->where('id', $row2->store_id)->value('name');

        }  
    }

    return $cat_lists;

}



}






}
