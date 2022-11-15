<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class OwnerController extends Controller
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
        return view("owner.casher", [
            "products" => $products,
            "menu" => "Owner"

        ]);
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
            return redirect("/owner")->with("failed", $message);
        } elseif ($request->buy_quantity <= 0) {
            return redirect("/owner")->with("failed", "Sila masukkan kuantiti yang benar!");
        } else {
            $product->product_quantity -= $request->buy_quantity;
            $product->product_sell = $product->product_sell + $request->buy_quantity;
            $product->product_sales = $product->product_price * $product->product_sell;
            $product->save();
            return redirect("/owner")->with("success", "Tahniah, proses pembelian berjaya");
        }
    }

    public function add(Request $request)
    {

        $total = $request->total_comfirm;
        if ($total == null) {
            return redirect("/owner");
        } else if ($total <= 0) {
            return "Sila masukkan nilai yang betul!";
        } else if ($total > 10) {
            return "Maaf anda tidak boleh tambah lebih 10 produk!";
        }

        return view("owner.add", [
            "products" => Product::getProducts(),
            "total" => $total,
            "menu" => "Owner"
        ]);
    }

    public function store(Request $request)
    {
        $product_name = $request->input("product_name", []);
        $product_price = $request->input("product_price", []);
        foreach ($product_name as $key => $product) {
            $products[] = [
                "product_name" => $product_name[$key],
                "product_price" => $product_price[$key],
                "created_at" => date("Y-m-d H:i:s")
            ];
        }
        Product::insert($products);
        return redirect("/owner")->with("success", "Barang berjaya di tambah!");
    }

    public function proses(Request $request)
    {
        $checked = $request->checked;
        if ($checked == null) {
            return "Sila pastikan anda memilih barang terlebih dahulu!";
        } else {
            foreach ($checked as $id) {
                $products[] = Product::find($id);
            }
        }

        if ($request->submit == "delete") {
            // here delete products 
            foreach ($products as $product) {
                Product::destroy($product->product_id);
            }
            return redirect("/owner")->with("success", "Barang yang anda pilih berjaya dipadam!");
        } else {
            // here edit product 
            return view("owner.edit", [
                "products" => Product::getProducts(),
                "product_edit" => $products,
                "menu" => "Owner"
            ]);
        }
    }

    public function update(Request $request)
    {
        $product_id = Product::find($request->product_id);
        foreach ($product_id as $key => $id) {
            Product::where("product_id", $id->product_id)->update(["product_name" => $request->product_name[$key]]);
            Product::where("product_id", $id->product_id)->update(["product_quantity" => $request->product_quantity[$key]]);
        }
        return redirect("/owner")->with("success", "Barang yang anda pilih berjaya di edit!");
    }
}
