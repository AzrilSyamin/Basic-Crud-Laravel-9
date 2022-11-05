<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class OwnerController extends Controller
{
    public function index()
    {
        return view("owner.casher", [
            "products" => Product::getProducts()
        ]);
    }

    public function cash(Request $request)
    {
        $product = Product::findOrFail($request->buy_product_name);

        $product->product_quantity = $product->product_quantity - $request->buy_quantity;
        $product->product_sell = $product->product_sell + $request->buy_quantity;

        $product->save();
        return redirect("/owner")->with("success", "Tahniah, proses pembelian berjaya");
    }

    public function add(Request $request)
    {

        $total = $request->total_comfirm;
        if ($total == null) {
            $total = 1;
        }
        return view("owner.add", [
            "products" => Product::getProducts(),
            "total" => $total
        ]);
    }

    public function store(Request $request)
    {
        $product_name = $request->input("product_name", []);
        $product_price = $request->input("product_price", []);
        foreach ($product_name as $key => $product) {
            $products[] = [
                "product_name" => $product_name[$key],
                "product_price" => $product_price[$key]
            ];
        }
        Product::insert($products);
        return redirect("/owner")->with("success", "Barang berjaya ditambah!");
    }

    public function edit(Request $request)
    {
        $checked = $request->checked;

        if ($checked == null) {
            // return redirect("/owner")->with("failed", "Sila pastikan anda memilih barang terlebih dahulu!");
            return "Sila pastikan anda memilih barang terlebih dahulu!";
        } else {
            foreach ($checked as $id) {
                $product_id[] = Product::find($id);
            }
        }

        return view("owner.edit", [
            "products" => Product::getProducts(),
            "product_edit" => $product_id
        ]);
    }

    public function update(Request $request)
    {
        $product_id = Product::find($request->product_id);
        foreach ($product_id as $key => $id) {
            Product::where("product_id", $id->product_id)->update(["product_name" => $request->product_name[$key]]);
            Product::where("product_id", $id->product_id)->update(["product_quantity" => $request->product_quantity[$key]]);
        }
        return redirect("/owner")->with("success", "Barang berjaya di update!");
    }
}
