<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TransactionController extends Controller
{
    public function transaction(Request $request) {
        $product_dec = Product::find($request->product_id);
        if ($product_dec->stock < 1) {
            $product_dec->stock = 0;
            $product_dec->save();
            return redirect()->to("/product/$request->product_id")->with('message', 'barangnya sudah habis');
        }
        --$product_dec->stock;
 
        $product_dec->save();
        return redirect()->to("/product");
    }
}
