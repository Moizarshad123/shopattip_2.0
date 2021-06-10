<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
   
    protected $table = 'vendors';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone','vendor_type','status'];
}
