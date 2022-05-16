<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescribe extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nroreceta',
        'codd',
        'nr'
    ];
}
