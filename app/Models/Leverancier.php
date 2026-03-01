<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    protected $table = 'Leverancier';
    public $timestamps = false;

    protected $fillable = [
        'Naam',
        'ContactPersoon',
        'LeverancierNummer',
        'Mobiel',
        'ContactId',
        'IsActief',
        'Opmerking',
        'DatumAangemaakt',
        'DatumGewijzigd'
    ];
}