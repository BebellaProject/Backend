<?php

namespace Bebella\Http\Controllers\Api\v1;

use DB;

use Illuminate\Http\Request;

use Bebella\Redirection;
use Bebella\Click;
use Bebella\Visualization;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ReportController extends Controller
{
    
    public function redirectsByProductOption ($id) 
    {
        return Redirection::where('product_option_id', $id)
                          ->where('active', true)
                          ->select(
                              DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d 00:00:00') as `date`"),
                              DB::raw("COUNT(id) as `count`")    
                          )
                          ->get();
    }
    
    public function clicksByProductOption ($id) 
    {
        return Click::where('product_option_id', $id)
                    ->where('active', true)
                    ->get();
    }
    
    public function viewsByProductOption ($id) 
    {
        return Visualization::where('product_option_id', $id)
                            ->where('active', true)
                            ->get();
    }
    
}
