<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $table = 'discount_code';

    protected $fillable = [
        'user_id',
        'discount_code',
        'percentage_decrease',
        'content',
        'quantity',
        'remaining_quantity',
        'time_application',
        'expired',
        'used_orders',
    ];
}
