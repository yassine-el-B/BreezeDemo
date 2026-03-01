<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'Contact';
    public $timestamps = false;

    protected $fillable = [
        'Straat',
        'Huisnummer',
        'Postcode',
        'Stad',
        'IsActief',
        'Opmerking',
        'DatumAangemaakt',
        'DatumGewijzigd'
    ];
}