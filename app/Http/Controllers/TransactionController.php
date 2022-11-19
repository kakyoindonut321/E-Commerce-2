<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\History;
use App\Models\Order;
use App\Models\tracking;

class TransactionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) 
        {
            if (auth()->user()->privilege == "admin") {
                return redirect()->back()->with('message-error', 'anda adalah admin');
            } 
            return $next($request);
        });
    }
    public function transaction(Request $request) {
        // dd($request);
        $product_dec = Product::find($request->product_id);
        if ($product_dec->stock < 1) {
            $product_dec->stock = 0;
            $product_dec->save();
            return redirect()->to("/product/$request->product_id")->with('message-error', 'barangnya sudah habis');
        }
        // HISTORY
        $history = new History;
        $history->user_id = $request->user;
        $history->price = $product_dec->price;
        $history->product_id = $request->product_id;
        $history->payment = "debit";
        $history->amount = $request->jumlah;
        $history->total = $request->jumlah * $product_dec->price;
        $history->save();

        // ORDER
        $order = new Order;
        $order->user_id = $request->user;
        $order->product_id = $request->product_id;
        $order->history_id = $history->id;
        $order->save();

        //TRANSACTION
        --$product_dec->stock;
        $product_dec->save();
        return redirect()->to("/product")->with('message-success', 'barang berhasil dibeli');
    }

    public function cartTransaction($transaction, $jumlah) {
        for ($x = 0; $x <= count($transaction) - 1; $x++) {
            if ($transaction[$x]->stock < 1) {
                $transaction[$x]->stock = 0;
                $transaction[$x]->save();
                return $orderError = true;
            }
            // HISTORY
            $history = new History;
            $history->user_id = auth()->user()->id;
            $history->price = $transaction[$x]->price;
            $history->product_id = $transaction[$x]->id;
            $history->payment = "debit";
            $history->total = $jumlah[$x] * $transaction[$x]->price;
            $history->amount = $jumlah[$x];
            $history->save();


            // ORDER
            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->product_id = $transaction[$x]->id;
            $order->history_id = $history->id;
            $order->save();
            
            //TRANSACTION
            $transaction[$x]->stock -= $jumlah[$x];
            $transaction[$x]->save();
        }
    }
}
