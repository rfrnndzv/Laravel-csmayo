<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $primarykey = "codd";
    public $incrementing = false;
    public $timestamps = false;

    public function getKeyName(){
        return "codd";
    }

    protected $fillable = [
        'codd',
        'nombre'
    ];
}
