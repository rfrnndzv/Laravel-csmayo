<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soporte extends Model
{
    use HasFactory;
    protected $table = 'soporte';
    protected $primarykey = 'cisoporte';
    public $incrementing = false;
    public $timestamps = false;

    public function getKeyName(){
        return "cisoporte";
    }
}
