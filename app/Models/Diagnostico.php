<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $primarykey = "codigo";
    public $incrementing = false;
    public $timestamps = false;

    public function getKeyName(){
        return "codigo";
    }

    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
