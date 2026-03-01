<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPerAllergeen extends Model
{
    protected $table = 'ProductPerAllergeen';
    public $timestamps = false;

    protected $fillable = [
        'ProductId',
        'AllergeenId',
        'IsActief',
        'Opmerking',
        'DatumAangemaakt',
        'DatumGewijzigd'
    ];
}