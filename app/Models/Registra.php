<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registra extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'registra';
    protected $primarykey = 'nrohc';

    public function getKeyName(){
        return "nrohc";
    }
    
    protected $fillable = [
        'nrohc',
        'ciadm',
        'cipaciente',
        'ciresponsable',
        'fecha',
        'accion'
    ];
}
