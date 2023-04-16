<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'user_id',
        'product_id',
        'slug',
        'title',
        'introduction',
        'content',
        'image_url',
        'image_public_id',
        'view',
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
