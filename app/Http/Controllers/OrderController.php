<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index() {
        return view('user.order', [
            'title' => 'Order',
            'orders' => Order::with('product', 'user')->where('user_id', auth()->user()->id)->get()    
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

    public function buy(Request $request) {
        // dd($request->order);
        foreach($request->jumlah as $a) {
            if ($a == null) {
                $a = 1;
            }
        }
        $buy = array(); 
        foreach($request->table as $table) {
            array_push($buy, Product::find($table));
        }

        app('App\Http\Controllers\TransactionController')->orderTransaction($buy, $request->jumlah);
        // foreach($request->order as $ord) {
        //     $delete = Order::find($ord)>delete();

        // }
        return redirect()->to("/product")->with('message-success', 'barang berhasil dibeli');
        
    }

    public function delete(Order $order) {
        $order->delete();
        return redirect('/order')->with('message-success', 'order telah di hapus');

    }
}
