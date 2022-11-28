<?php

namespace App\Http\Controllers;
use App\Models\History;
use Illuminate\Http\Request;

class historyController extends Controller
{
    public function index() {
        return view('user.history', [
            'title' => 'History',
            'history' => History::with('product', 'user')->latest()->where('user_id', auth()->user()->id)->paginate(10),
            "cartCount" => $this->cartCount
        ]);
    }

    public function adminIndex() {
        return view('user.history', [
            'title' => 'History',
            'history' => History::with('product', 'user')->latest()->paginate(10),
            "cartCount" => $this->cartCount
        ]);
    }

}
