<?php

namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory;

    protected $table = 'warehouses';

    protected $fillable = [
        'product_id',
        'import_quantity',
        'quantity_stock',
        'quantity_sold',
    ];

    public function product ()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
