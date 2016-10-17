<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends BaseModel
{
    protected $fillable = [
        'owner',
        'image',
        'name',
        'nature',
        'hp',
        'atk',
        'spa',
        'def',
        'spd',
        'spe'
    ];
}
