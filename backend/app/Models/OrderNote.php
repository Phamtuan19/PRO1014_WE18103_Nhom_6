<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNote extends Model
{
    use HasFactory;

    protected $table = 'order_notes';

    protected $fillable = [
        'user_id',
        'note_takers',
        'content',
    ];
}
