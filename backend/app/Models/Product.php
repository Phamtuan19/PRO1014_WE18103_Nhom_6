<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_code',
        'author_id',
        'category_id',
        'publishing_house_id',
        'user_id',
        'name',
        'title',
        'introductio',
        'publication_date',
    ];

    public function author () {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function categories () {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function publishing_house () {
        return $this->belongsTo(PublishingHouse::class, 'publishing_house_id', 'id');
    }

    public function users () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
