<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAbsensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'screenshoot',
        'kesan',
        'review',
        'absensi_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
