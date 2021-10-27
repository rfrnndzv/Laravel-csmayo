<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmedica extends Model
{
    use HasFactory;
    protected $table = 'cmedica';
    protected $primarykey = 'nrocm';
    public $incrementing = false;
    public $timestamps = false;

    public function getKeyName(){
        return "nrocm";
    }

    protected $fillable = [
        'objetivo',
        'subjetivo',
        'analisis',
        'paccion',
    ];
}
