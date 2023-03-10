<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'author';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function product (){
        return $this->hasMany(Product::class, 'id', 'author_id');
    }
}
