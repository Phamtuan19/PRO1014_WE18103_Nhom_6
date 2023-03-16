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

    public function queryAuthor($query, $orderBy = null, $orderType = null)
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

    public function product (){
        return $this->hasMany(Product::class, 'id', 'author_id');
    }
}
