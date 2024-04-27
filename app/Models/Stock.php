<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'A_plus',
        'A_minus',
        'B_plus',
        'B_minus',
        'AB_plus',
        'AB_minus',
        'O_plus',
        'O_minus',
        'place_id',
    ];
}
