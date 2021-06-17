<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;
    protected $table = 'sub_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'name', 'url_name'];

    // public function product(){
    //     return $this->belongTo(Product::class,'subcategory_id');
    // }

    public function category(){

        return $this->belongsTo(Category::class,'category_id');
    }

    public function childSubcategory(){

        return $this->hasMany(ChildSubCategory::class,'sub_category_id');
    }
    
}
