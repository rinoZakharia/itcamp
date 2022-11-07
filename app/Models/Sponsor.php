<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $primaryKey = 'idSponsor';

    protected $fillable = [
        'namaSponsor',
        'ukuranSponsor',
        'gambarSponsor'
    ];
}
