<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $casts = [
        'events' => 'array',
    ];

    private static $whiteListFilter = [
        '*'
    ];

    protected $fillable = [
        'id',
        'codi',
        'data_inici',
        'data_fi',
        'descripcio',
        'entrades',
        'tags_categor_es',
        'comarca_i_municipi',
        'horari',
        'imatges',
        'codi_postal',
        'adre_a',
        'tel_fon',
        'descripcio_html',
    ];
}
