<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;

class productController extends Controller
{
    public function main() {
        $product = [
            "title" => "E-Commerce",
            "category" => Category::all(),
            "products" => Product::with('category')->latest()->filter(request(['category', 'search']))->paginate(10)->withQueryString()
        ];
        return view('landing-page', $product);
    }

    public function index(Request $request) {
        $product = [
            "title" => "Products",
            "products" => Product::with('category')->latest()->filter(request(['category', 'search']))->paginate(10)->withQueryString(),
            "orderCount" => $this->orderCount

        ];
        return view('/product/listing', $product);
    }

    public function report() {
        return view('admin.report', [
            'title' => 'Report',
            "orderCount" => $this->orderCount
        ]);
    }

    public function input() {
        return view('admin.InputProduct', [
            'title' => 'Input Produk',
            'category' => Category::all(),
            "orderCount" => $this->orderCount
        ]);
    }

    public function edit(Product $product) {
        return view('admin.EditProduct', [
            'title' => 'Input Produk',
            'product' => $product,
            'category' => Category::all(),
            "orderCount" => $this->orderCount
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',
            // 'cover_image' => 'required'
        ]);
        $input = new Product;
        $input->name = $request-> name;
        $input->description = $request-> description;
        $input->stock = $request-> stock;
        $input->price = $request-> price;
        $input->category_id = $request->category;
        $input->user = $request-> user;
        

        if ($request->hasFile('cover_image')) {
            $input->image = $request->file('cover_image')->store('image/produk', 'public');
        }

        $input ->save();

        return redirect()->to("/product")->with('message-success', 'produk baru telah dibuat');
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect('/product')->with('message-success', 'produk telah di hapus');

    }

    public function show(Product $product) {
        return view('product.detail', [
            'title' => $product->name,
            'product' => $product,
            "orderCount" => $this->orderCount
        ]);
    }


    public function update(Request $request, Product $product) {
        $formUpdate =  $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        // dd($formUpdate);

        if ($request->hasFile('cover_image')) {
            $product->image = $request->file('cover_image')->store('image/produk', 'public');
        }

        if (
            $product->name == $request->name and
            $product->description == $request->description and 
            $product->stock == $request->stock and 
            $product->price == $request->price and
            $product->category_id == $request->category_id
            ) 
        {
            return redirect()->to("/product")->with('message-warning', 'data produk tidak berubah');
        }
        $product->update($formUpdate);
        return redirect()->to("/product")->with('message-success', 'produk berhasil di update');
    }
}


// not used
    // public function paging($para_A) {
    //     $i_one = 0;
    //     $i_two = 0;
    //     $ar_first = array();
    //     $ar_last =  array();
    //     foreach ($para_A as $para_new) {
    //         $i_one++;
    //         array_push($ar_first, $para_new);
    //         if ($i_one % 10 == 0) {
    //             array_push($ar_last, $ar_first);
    //             $ar_first = array();
    //             $i_two = $i_one;
    //         }
    //     }
    //     $ar_first = array();
    //     if (!($i_one % 10 == 0)) {
    //         $new_count = $i_one - $i_two;
    //         $range = range(0, $new_count -1);
    //         foreach ($range as $n) {
    //             array_push($ar_first, $para_A[($i_two + $n)]);
    //         }
    //         array_push($ar_last, $ar_first);
    //     }
    //     return $ar_last;
    // }


            // if($request->file("cover_image")){
        //     $name_file = $request->file("cover_image")->Hashname();
        //     // Storage::put("coverImg/$name_file" , $request->file("cover_image") , "public");
        //     $request->file("cover_image")->storePubliclyAs("image/produk" , $name_file);
        //     $input ->image = $name_file;
        // }