<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
