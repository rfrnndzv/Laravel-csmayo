<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hclinica extends Model
{
    use HasFactory;

    protected $table = 'hclinica';
    protected $primarykey = 'nrohc';

    public function getKeyName(){
        return "nrohc";
    }

    protected $fillable = [
        'codfam',
        'seguro',
        'establecimiento',
        'p1',
        'p2'
    ];
}
