<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $table = 'delivery_address';

    protected $fillable = [
        'order_id',
        'name',
        'email',
        'phone',
        'province_city',
        'county_district',
        'house_number_street_name',
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order () {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
