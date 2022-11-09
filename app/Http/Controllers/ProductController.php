<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getProducts();
        if (request("header_search_input")) {
            $searchSelect = request("header_search_select");
            $search = request("header_search_input");
            if ($searchSelect) {
                $products = Product::headerSearch($search, $searchSelect);
            } else {
                $products = Product::headerSearch($search);
            }
        }
        return view(
            "public.public",
            [
                "products" => $products,
                "menu" => "Home"
            ]
        );
    }

    public function cash(Request $request)
    {
        $product = Product::findOrFail($request->buy_product_name);
        $productQuantity = $product->product_quantity;
        if ($request->buy_quantity > $productQuantity) {
            switch ($productQuantity) {
                case NULL:
                    $productQuantity = "Belum Ada!";
                    $message = "Maaf stock $product->product_name $productQuantity";
                    break;
                case 0:
                    $productQuantity = "sudah Habis Dijual!";
                    $message = "Maaf $product->product_name $productQuantity";
                    break;
                default:
                    $productQuantity = "hanya $productQuantity unit!";
                    $message = "Jumlah barang yang anda inginkan tidak mencukupi, stock $product->product_name $productQuantity";
            }
            return redirect("/")->with("failed", $message);
        } elseif ($request->buy_quantity <= 0) {
            return redirect("/")->with("failed", "Sila masukkan kuantiti yang benar!");
        } else {
            $product->product_quantity -= $request->buy_quantity;
            $product->product_sell = $product->product_sell + $request->buy_quantity;
            $product->product_sales = $product->product_price * $product->product_sell;
            $product->save();
            return redirect("/")->with("success", "Tahniah, proses pembelian berjaya");
        }
    }
}
