<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $orderCount;
    public function __construct() 
    {
        $this->middleware(function ($request, $next) 
        {
            if (auth()->check()) {
                $this->orderCount = Order::where('user_id',  auth()->user()->id)->get()->count();
            } else {
                $this->orderCount = null;
            }
            return $next($request);
        });
            
        
    }

    // public function Ordercount($idSession) {
    //     $this->orderCount = Order::where('user_id',  auth()->user()->id)->get()->count();
    // }
}
