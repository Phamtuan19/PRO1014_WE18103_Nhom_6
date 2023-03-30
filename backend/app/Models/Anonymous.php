<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anonymous extends Model
{
    use HasFactory;

    protected $table = 'anonymous';

    protected $fillable = [
        'order_id',
        'user_id',
        'name',
        'phone',
        'email',
        'province_city',
        'county_district',
        'house_number_street_name',
    ];

    public function order () {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function user () {
        return $this->belongsToMany(User::class, 'user_id', 'id');
    }
}
