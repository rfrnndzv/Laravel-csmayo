<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;
    protected $table = 'anexo';
    protected $primarykey = 'nroanexo';
    public $timestamps = false;

    public function getKeyName(){
        return "nroanexo";
    }
}
