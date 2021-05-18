<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_type_id', 'category_id', 'subcategory_id', 'child_subcategory_id', 'brand_id', 'tags', 'description', 'front_image', 'colors', 'options', 'sale_price', 'perchase_price', 'discount', 'discount_type', 'shipping_cost'];

    
}
