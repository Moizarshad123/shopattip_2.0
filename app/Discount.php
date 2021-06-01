<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'discounts';

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
    protected $fillable = ['category_type', 'disount_type', 'discount', 'start_date', 'end_date'];

    public function category(){

        return $this->hasMany(Category::class, 'id', 'category_id');

    }
    public function subCategory(){
    	return $this->hasMany(SubCategory::class,'id','subcategory_id');
    }
    public function subChildCategory(){
    	return $this->hasMany(ChildSubCategory::class,'id','child_subcategory_id');
    }
    
}
