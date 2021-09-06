<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amedica extends Model
{
    use HasFactory;
    protected $table = 'amedica';
    protected $primarykey = 'nroam';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = ['cienf'];

    public function getKeyName(){
        return "nroam";
    }
}
