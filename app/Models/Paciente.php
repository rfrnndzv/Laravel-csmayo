<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente';
    protected $primarykey = 'cipaciente';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $guard = [];

    public function getKeyName(){
        return "cipaciente";
    }
}
