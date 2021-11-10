<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $primarykey = 'nroreceta';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nroreceta',
        'tipoatencion',
        'fecha',
        'cifarm',
    ];

    public function getKeyName(){
        return "nroreceta";
    }
}
