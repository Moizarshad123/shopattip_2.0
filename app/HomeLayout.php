<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeLayout extends Model
{
    protected $table = 'home_layouts';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'active'];
}
