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
        // $orderan = $request->validate([
        //     'product_id' => 'required|unique:orders'
        // ]);
        ORDER::insert(
            array(
                   'id'     =>   null, 
                   'user_id'   =>   $request->user  ,
                   'product_id'   =>   $request->product_id,
                   'status' => 'order'
            )
       );
       return redirect()->to("/product/$request->product_id")->with('message-success', 'barang berhasil ditambah');
        // return view('rickroll', [
        //     'title' => 'rickroll',
        //     'orderan' => $orderan
        // ]);
    }
}
