<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function queryCategory($query, $orderBy = null, $orderType = null)
    {
        if (empty($orderBy)) {
            $orderBy = 'created_at';
        }

        if (empty($orderType)) {
            $orderType = "DESC";
        }

        // dd($orderType);
        $query = $query->orderBy($orderBy, $orderType);

        return $query;
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }
}
