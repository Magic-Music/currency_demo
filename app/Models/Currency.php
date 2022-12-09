<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Models only contain the details required for eloquent to interact with the database
 * No logic should live in a model
 * 'Scopes' can be defined which are essentially predefined queries
 */
class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'isoCode',
        'symbol',
        'dollarValue',
        'symbolBefore',
        'thousandsSeperator',
        'decimalsSeperator',
    ];
}
