<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawab extends Model
{
    use HasFactory;
    protected $primaryKey = 'idJawab';
    protected $guarded = [];

    // fillable
    protected $fillable = [
        'email',
        'idTugas',
        'jawaban',
        'nilai',
        'status'
    ];

}
