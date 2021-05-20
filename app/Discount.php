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

    
}
