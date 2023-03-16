<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'products_detail';

    protected $fillable = [
        'product_id',
        'size',
        'page_number',
        'weight',
        'import_price',
        'price',
        'promotion_price'
    ];
}
