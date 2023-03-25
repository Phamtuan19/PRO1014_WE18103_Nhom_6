<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderNote;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\DiscountCode;
use App\Models\DeliveryAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'code_order',
        'user_id',
        'anonymous_id',
        'discount_code_id',
        'date_order',
        'date_confirmation',
        'date_delivered',
        // 'order_notes_id',
        'order_status_id',
        'payment_form',
        'payment_status',
        'quantity',
        'total_price',
        'shipping_fee',
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function anonymous () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function discountCode () {
        return $this->belongsTo(DiscountCode::class, 'discount_code_id', 'id');
    }

    public function note () {
        return $this->hasMany(OrderNote::class, 'order_id', 'id');
    }

    public function detail () {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function deliveryAddress () {
        return $this->hasOne(DeliveryAddress::class, 'order_id', 'id');
    }

    public function orderStatus () {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }
}
