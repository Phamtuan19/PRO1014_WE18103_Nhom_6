<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublishingHouse extends Model
{
    use HasFactory;

    protected $table = 'publishing_house';

    protected $fillable = [
        'name',
        'slug',
        'storecatalog_id',
    ];

    public function queryPublishingHouse($query, $orderBy = null, $orderType = null)
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
        return $this->hasMany(Product::class, 'publishing_house_id', 'id');
    }
}
