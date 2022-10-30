<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        return view('user.order', [
            'title' => 'Order',
            'order' => Order::with('product', 'user')->where('user_id', auth()->user()->id)->get()    
        ]);
    }

    public function create(Request $request) {
        ORDER::insert(
            array(
                   'id'     =>   null, 
                   'user_id'   =>   $request->user,
                   'product_id'   =>   $request->produk,
                   'status' => 'order'
            )
       );
       return redirect()->to("/product");
    }
}
