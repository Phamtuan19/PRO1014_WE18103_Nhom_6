<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishingHouse extends Model
{
    use HasFactory;

    protected $table = 'publishing_house';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function product (){
        return $this->hasMany(Product::class, 'id', 'publishing_house_id');
    }
}
