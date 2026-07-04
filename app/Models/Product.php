<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_products';
    protected $fillable = ['pro_name', 'price', 'qty', 'category', 'image'];
}
