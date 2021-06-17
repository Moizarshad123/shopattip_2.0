<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productSpecification extends Model
{
    protected $table = 'product_specification';
    protected $fillable = ['product_id', 'specification_title', 'specification_description', 'active'];
}
