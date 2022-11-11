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

    public function event()
    {
        return $this->belongsTo('Events');
    }

    protected $fillable = [
        'codi',
        'data_inici',
        'data_fi',
        'descripcio',
        'entrades',
        'horari',
        'imatges',
        'codi_postal',
        'adreça',
        'localitat',
        'telefon',
        'descripcio_html',
    ];


}
