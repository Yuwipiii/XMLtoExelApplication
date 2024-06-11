<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'sub_category',
        'sub_sub_category',
        'available',
        'url',
        'price',
        'picture',
        'name',
        'currency_id',
        'old_price',
        'product_id'
    ];
}
