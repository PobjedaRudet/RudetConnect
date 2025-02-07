<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionOrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'production_order_id',
        'product_id',
        'quantity',
        'note',

    ];
}
