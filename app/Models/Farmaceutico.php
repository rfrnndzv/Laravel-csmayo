<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmaceutico extends Model
{
    use HasFactory;

    protected $primarykey = 'cifarm';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'cifarm',
        'turno',
    ];

    public function getKeyName(){
        return "cifarm";
    }
}
