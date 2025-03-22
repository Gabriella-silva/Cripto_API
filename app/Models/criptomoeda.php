<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class criptomoeda extends Model
{
    protected $fillable = [
        'sigla',
        'nome',
        'valor',
    ];
}
