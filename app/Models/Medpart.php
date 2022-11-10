<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medpart extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $primaryKey = 'idMed';

    protected $fillable = [
        'namaMed',
        'urlMed',
        'gambarMed'
    ];
}
