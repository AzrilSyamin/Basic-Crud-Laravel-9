<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Requests;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["product_name", "product_price"];
    // protected $guarded = ["product_id"];
    protected $primaryKey = 'product_id';

    public static function getProducts()
    {
        return Product::latest()->paginate(10)->withQueryString();
    }

    public static function headerSearch($value, $column = null)
    {
        if ($column == null) {
            return Product::latest()
                ->where("product_name", "LIKE", "%" . $value . "%")
                ->orWhere("product_quantity", "LIKE", "%" . $value . "%")
                ->orWhere("product_sell", "LIKE", "%" . $value . "%")
                ->paginate(10)->withQueryString();
        } else {
            return Product::latest()
                ->where($column, "LIKE", "%" . $value . "%")
                ->paginate(10)->withQueryString();
        }
    }
}
