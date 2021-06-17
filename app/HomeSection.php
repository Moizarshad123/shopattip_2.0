<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $table = 'home_sections';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'layout_id', 'active'];
}
