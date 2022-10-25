<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction() {
        return view('product.buy', ['title' => 'transaction']);
    }
}
