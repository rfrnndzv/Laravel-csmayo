<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    
    protected $table = 'persona';
    protected $primarykey = 'ci';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = ['ci', 'nombres', 'apaterno', 'amaterno'];

    public function getKeyName(){
        return "ci";
    }
}
