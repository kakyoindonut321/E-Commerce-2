<?php

namespace App\Http\Controllers;
use App\Models\History;
use Illuminate\Http\Request;

class historyController extends Controller
{
    public function index() {
        return view('user.history', [
            'title' => 'History',
            'history' => History::with('product', 'user')->where('user_id', auth()->user()->id)->get(),
            "cartCount" => $this->cartCount
        ]);
    }

}
