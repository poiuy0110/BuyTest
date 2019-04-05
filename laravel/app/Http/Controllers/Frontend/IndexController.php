<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IndexSlide;
use App\Models\About;
use App\Models\Product;


class IndexController extends Controller
{
    public function index ()
    {   
        $index_photo_lists = $this->getIndexSlideLists();    
        $cat_lists = $this->getFrontendCatLists();
        $news_lists = $this->getNewsLists();   
        $hot_lists = $this->getHotLists();   

        return view('frontend.index', compact(['cat_lists','index_photo_lists','news_lists','hot_lists']));
    }


    private function getIndexSlideLists()
    {

        $index_photo_lists = IndexSlide::where('vw','=','1')->orderBy('seq')->get();

        return $index_photo_lists;

    }

    private function getNewsLists()
    {

        $news_lists = About::where('kind','=','主題活動')->orderBy('id')->get();

        return $news_lists;

    }

    private function getHotLists()
    {

        $hot_lists = Product::where('hot','=','1')->orderBy('id')->get();

        return $hot_lists;

    }
    



}
