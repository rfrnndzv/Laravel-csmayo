<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;
    protected $table = 'administrativo';
    protected $primarykey = 'ciadm';
    public $incrementing = false;
    public $timestamps = false;

    public function getKeyName(){
        return "ciadm";
    }
}
