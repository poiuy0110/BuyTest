<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

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



}
