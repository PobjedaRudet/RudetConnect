<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductionOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'OrderNumber',
        'OrderDate',
        'Description',
        'Metraza',
        'Status',
        'VrstaProvodnika',
        'Tip',
        'BojaDuzinaProvodnika',
        'Pakovanje',
        'AtestPaketa',
        'CeOznaka',
        'KlasaOpasnosti',
        'UNBroj',
        'RokIsporuke',
        'DatumPredaje',
        'DatumPrijema',
        'Napomena',
        'token',
        'user_id',
        'parent_nalog_id',
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate a unique token when creating a new order
        static::creating(function ($order) {
            $order->token = Str::uuid(); // or Str::random(40) for a random string
        });
    }
}
