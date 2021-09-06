<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermera extends Model
{
    use HasFactory;
    protected $table = 'enfermera';
    protected $primarykey = 'cienf';
    public $incrementing = false;
    public $timestamps = false;

    public function getKeyName(){
        return "cienf";
    }
}
