<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\History;

class TransactionController extends Controller
{
    public function transaction(Request $request) {
        // dd($request);
        $product_dec = Product::find($request->product_id);
        if ($product_dec->stock < 1) {
            $product_dec->stock = 0;
            $product_dec->save();
            return redirect()->to("/product/$request->product_id")->with('message-error', 'barangnya sudah habis');
        }
        $history = new History;
        $history->user_id = $request->user;
        $history->product_id = $request->product_id;
        $history->payment = "debit";
        $history->amount = $request->jumlah;
        $history->save();

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

            $history = new History;
            $history->user_id = auth()->user()->id;
            $history->price = $transaction[$x]->price;
            $history->product_id = $transaction[$x]->id;
            $history->payment = "debit";
            $history->total = $jumlah[$x] * $transaction[$x]->price;
            $history->amount = $jumlah[$x];
            $history->save();

            $transaction[$x]->stock -= $jumlah[$x];
            $transaction[$x]->save();
        }
    }
}
