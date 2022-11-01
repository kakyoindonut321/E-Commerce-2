<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class productController extends Controller
{
    public function variable() {
        return $listing = count($this->paging(Product::all())) - 1;
    }

    public function returnGet(Request $request) {
        if ($this->variable() < $request->page) {
            return abort(404);
        }
        $page= $request->page;
        
        return $page;
    }

    public function paging($para_A) {
        $i_one = 0;
        $i_two = 0;
        $ar_first = array();
        $ar_last =  array();
        foreach ($para_A as $para_new) {
            $i_one++;
            array_push($ar_first, $para_new);
            if ($i_one % 10 == 0) {
                array_push($ar_last, $ar_first);
                $ar_first = array();
                $i_two = $i_one;
            }
        }
        $ar_first = array();
        if (!($i_one % 10 == 0)) {
            $new_count = $i_one - $i_two;
            $range = range(0, $new_count -1);
            foreach ($range as $n) {
                array_push($ar_first, $para_A[($i_two + $n)]);
            }
            array_push($ar_last, $ar_first);
        }
        return $ar_last;
    }
    

    public function index(Request $request) {
        $product = [
            "title" => "Products",
            "product" => $this->paging(Product::all()),
            "getPage" => $this->returnGet($request)
        ];
        return view('/product/listing', $product);
    }

    public function report() {
        return view('admin.report', [
            'title' => 'Report'
        ]);
    }

    public function input() {
        return view('admin.InputProduct', [
            'title' => 'Input Produk'
        ]);
    }

    public function store(Request $request) {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'stock' => 'required',
        //     'price' => 'required',
        //     'file' => 'required'
        // ]);
        $input = new Product;
        $input->name = $request-> name;
        $input->description = $request-> description;
        $input->stock = $request-> stock;
        $input->price = $request-> price;
        $input->category_id = 1;
        
        // if($request->file("cover_image")){
        //     $name_file = $request->file("cover_image")->Hashname();
        //     // Storage::put("coverImg/$name_file" , $request->file("cover_image") , "public");
        //     $request->file("cover_image")->storePubliclyAs("image/produk" , $name_file);
        //     $input ->image = $name_file;
        // }
        if ($request->hasFile('cover_image')) {
            $input->image = $request->file('cover_image')->store('image/produk', 'public');
        }

        $input ->save();

        return redirect()->to("/product")->with('message-success', 'produk baru telah dibuat');
    }

    public function delete(Product $listing) {
        dd($listing);
        $listing->delete();
        return redirect('/product')->with('message-success', 'produk telah di hapus');

    }

    public function show(Product $product) {
        return view('product.detail', [
            'title' => $product->name,
            'product' => $product
        ]);
    }



}
