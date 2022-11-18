<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $cartCount;
    public function __construct() 
    {
        $this->middleware(function ($request, $next) 
        {
            if (auth()->check()) {
                $this->cartCount = Cart::where('user_id',  auth()->user()->id)->get()->count();
            } else {
                $this->cartCount = null;
            }
            return $next($request);
        });
            
        
    }

    // public function cartCount($idSession) {
    //     $this->cartCount = Order::where('user_id',  auth()->user()->id)->get()->count();
    // }
}
