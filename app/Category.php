<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table      = 'categories';
    protected $primaryKey = 'id';
    protected $fillable   = ['category_type_id', 'level_name', 'name', 'url_name', 'description', 'banner', 'status'];

    public function subCategory(){
    	return $this->hasMany(SubCategory::class);
    }

    public function product(){
        // return $this->belongTo(Product::class,'category_id');
    	// return $this->hasMany(Product::class);

    }
}
