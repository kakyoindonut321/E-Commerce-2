<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\History;
use App\Models\tracking;
use App\Models\Product;

class OrderController extends Controller
{
    public function index() {
        return view('admin.order', [
            'title' => 'Order',
            'orders' => Order::with('product', 'user')->latest()->paginate(10),
            "cartCount" => $this->cartCount
        ]);
    }

    public function aproval(Order $order, Request $request) {
        $history = History::find($order->history_id);
        $item = product::find($order->product_id);
        $history->status = $request->aproval;
        $history->update();
        $order->delete();
        

        switch ($request->aproval) {
            case "accepted":
                return redirect()->back()->with('message-success', 'order diterima');
                break;
            case "declined":
                $item->stock += $history->amount;
                $item->sold -= $history->amount;
                $item->update();
                return redirect()->back()->with('message-success', 'order ditolak');
                break;
            default:
          }
    }

    public function create(Request $request) {
    //     $orderan = $request->validate([
    //         'product_id' => 'required|unique:orders'
    //     ]);
    //     ORDER::insert(
    //         array(
    //                'id'     =>   null, 
    //                'user_id'   =>   $request->user  ,
    //                'product_id'   =>   $request->product_id,
    //                'status' => 'order'
    //         )
    //    );
       return redirect()->to("/product/$request->product_id")->with('message-success', 'barang berhasil ditambah');
        // return view('rickroll', [
        //     'title' => 'rickroll',
        //     'orderan' => $orderan
        // ]);
    }

    public function buy(Request $request) {
        // $request->validate([
        //     'table' => 'required'
        // ]);
        // // dd($request);
        // foreach($request->jumlah as $a) {
        //     if ($a == null) {
        //         $a = 1;
        //     }
        // }
        // $buy = array(); 
        // // dd($request->table);
        // foreach($request->table as $table) {
        //     $order = Order::with("product")->find($table)->product;
        //     // dd(auth()->check());
        //     array_push($buy,$order);
        // }


        // app('App\Http\Controllers\TransactionController')->orderTransaction($buy, $request->jumlah);

        // foreach($request->table as $ord) {
        //     Order::find($ord)->delete();
        // }

        return redirect()->to("/product")->with('message-success', 'barang berhasil dibeli');
        
    }

    // public function delete(Order $order) {
    //     $order->delete();
    //     return redirect('/order')->with('message-success', 'order telah di hapus');

    // }
}
