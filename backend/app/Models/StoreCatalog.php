<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreCatalog extends Model
{
    use HasFactory;

    protected $table = 'store_catalog';

    protected $fillable = [
        'name',
        'lug',
        'path',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(StoreCatalog::class, 'parent_id');
    }

    public function categories()
    {
        return $this->hasMany(Categories::class, 'storecatalog_id', 'id');
    }

    public function author()
    {
        return $this->hasMany(Author::class, 'storecatalog_id', 'id');
    }

    public function publishingHouse()
    {
        return $this->hasMany(PublishingHouse::class, 'storecatalog_id', 'id');
    }
}
