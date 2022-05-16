<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $primarykey = "id";
    public $timestamps = false;

    public function getKeyName(){
        return "id";
    }

    protected $fillable = [
        'medicamento',
        'indicacion',
        'crecetada',
        'cdispensada',
        'valor'
    ];
}
