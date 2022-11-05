<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // dd(Product::all());
        return view("public.public", ["products" => Product::getProducts()]);
    }

    public function cash(Request $request)
    {
        $product = Product::findOrFail($request->buy_product_name);

        $product->product_quantity = $product->product_quantity - $request->buy_quantity;
        $product->product_sell = $product->product_sell + $request->buy_quantity;

        $product->save();
        return redirect("/owner")->with("success", "Tahniah, proses pembelian berjaya");
    }
}
