<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductVariation extends Model
{
    //
    protected $table = 'product_variation';

    public function product(){
        return $this->belongTo(Product::class);
    }
}
