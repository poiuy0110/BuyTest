<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Response;

class AutoCompleteController extends Controller
{
    //

    public function getProdComplete()
    {
        
        $term = Input::get('term');
	
        $results = array();
        
        $queries = DB::table('product')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->orWhere('desp', 'LIKE', '%'.$term.'%')
            ->take(5)->get();
        
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'name' => $query->name ];
        }
        return Response::json($results);
    }


    





}
