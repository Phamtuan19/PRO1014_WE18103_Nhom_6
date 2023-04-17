<?php

namespace App\Models;

use App\Models\Image;

use App\Models\Author;

use App\Models\Warehouse;

use App\Models\ProductDetail;
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
        'introduction',
        'publication_date',
        'is_deleted',
    ];

    public function queryProduct($query, $orderBy = null, $orderType = null, $isDelete = null)
    {
        if (empty($orderBy)) {
            $orderBy = 'created_at';
        }

        if (empty($orderType)) {
            $orderType = "DESC";
        }

        if (empty($isDelete)) {
            $query = $query->whereNull('is_deleted');
        } else {
            $query = $query->whereNotNull('is_deleted');
        }

        // dd($orderType);
        $query = $query->orderBy($orderBy, $orderType);

        return $query;
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function publishing_house()
    {
        return $this->belongsTo(PublishingHouse::class, 'publishing_house_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detail()
    {
        return $this->hasOne(ProductDetail::class, 'product_id', 'id');
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
