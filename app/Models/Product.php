<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Requests;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["product_name", "product_price"];
    // protected $guarded = ["product_id"];
    protected $primaryKey = 'product_id';

    public static function getProducts()
    {
        return DB::table('products')->paginate(8);
    }
}
