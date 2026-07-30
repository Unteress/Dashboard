<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'dimension',
        'average',
        'diagnosis',
        'simulated_indicator',
        'author',
        'priority',
        'recommendation',
    ];
}
