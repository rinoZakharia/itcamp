<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    use HasFactory;
    // without timestamp
    public $timestamps = false;
    protected $primaryKey = 'idBayar';
    // with Users by email
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
