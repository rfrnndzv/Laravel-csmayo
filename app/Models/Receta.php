<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $primarykey = 'nroreceta';
    public $timestamps = false;

    protected $fillable = [
        'nroreceta',
        'medicamento',
        'indicacion',
        'crecetada',
        'cdispensada',
        'valor'
    ];

    public function getKeyName(){
        return "nroreceta";
    }
}
