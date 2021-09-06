<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $table = 'medico';
    protected $primarykey = 'cimed';
    public $incrementing = false;
    public $timestamps = false;

    public function getKeyName(){
        return "cimed";
    }
}
