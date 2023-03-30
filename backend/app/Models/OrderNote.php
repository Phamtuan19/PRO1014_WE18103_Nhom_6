<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderNote extends Model
{
    use HasFactory;

    protected $table = 'order_notes';

    protected $fillable = [
        'order_id',
        'user_id',
        'note_takers',
        'content',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
