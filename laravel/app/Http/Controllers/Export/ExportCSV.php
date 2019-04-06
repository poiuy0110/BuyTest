<?php
namespace App\Http\Controllers\Export;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportCSV implements FromView
{   

    private $lists;
    private $blade_name;

    public function __construct($lists, $blade_name)
    {
         $this->blade_name = $blade_name;
         $this->lists = $lists;
    }

    public function view(): View
    {
        return view($this->blade_name , [
            'lists' => $this->lists
        ]);
    }
}

?>