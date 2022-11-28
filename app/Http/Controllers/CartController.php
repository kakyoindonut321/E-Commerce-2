<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index() {
        return view('user.cart', [
            'title' => 'Cart',
            'carts' => Cart::with('product', 'user')->where('user_id', auth()->user()->id)->latest()->paginate(10),
            "cartCount" => $this->cartCount
        ]);
    }

    public function create(Request $request) {
        $orderan = $request->validate([
            'product_id' => 'required|unique:carts'
        ]);
        CART::insert(
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
        $request->validate([
            'table' => 'required'
        ]);
        // dd($request);
        foreach($request->jumlah as $a) {
            if ($a == null) {
                $a = 1;
            }
        }
        $buy = array(); 
        // dd($request->table);
        foreach($request->table as $table) {
            $order = Cart::with("product")->find($table)->product;
            // dd(auth()->check());
            array_push($buy,$order);
        }


        app('App\Http\Controllers\TransactionController')->cartTransaction($buy, $request->jumlah);

        foreach($request->table as $cart) {
            Cart::find($cart)->delete();
        }

        return redirect()->to("/product")->with('message-success', 'barang berhasil dibeli');
        
    }

    public function delete(Cart $cart) {
        $cart->delete();
        return redirect('/cart')->with('message-success', 'barang telah di hapus dari keranjang');

    }
}
