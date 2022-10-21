<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function returnGet(Request $request) {
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
            if ($i_one % 8 == 0) {
                array_push($ar_last, $ar_first);
                $ar_first = array();
                $i_two = $i_one;
            }
        }
        $ar_first = array();
        if (!($i_one % 8 == 0)) {
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
        $the_array = [
            'the_array' => Product::all(),
            'lenght' => count(Product::all()) 
        ];

        $product = [
            "product" => $this->paging(Product::all()),
            "getPage" => $this->returnGet($request)
        ];

        return view('/product/listing', $product);
    }


}
