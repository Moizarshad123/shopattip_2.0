<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $fillable   = ['product_type_id', 'category_id', 'subcategory_id', 'child_subcategory_id', 'brand_id', 'tags', 'description', 'front_image', 'colors', 'options', 'sale_price', 'perchase_price', 'discount', 'discount_type', 'shipping_cost'];

    public function category(){

        return $this->hasMany(Category::class, 'id', 'category_id');
    	// return $this->hasMany(Category::class,'id');
        // return $this->belongTo(Category::class,'id');

    }
    public function subCategory(){
    	return $this->hasMany(SubCategory::class,'id','subcategory_id');
    }
    public function subChildCategory(){
    	return $this->hasMany(ChildSubCategory::class,'id','child_subcategory_id');
    }
    public function productVariaction(){
    	return $this->hasMany(ProductVariation::class,'product_id');
    }
    public function brand(){
    	return $this->hasMany(Brand::class,'id');
    }
}
