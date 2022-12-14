<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'email';
    public $incrementing = false;

    public static function isPayed()
    {
        $user = Bayar::where(['email' => session('email.peserta'), 'flag' => 1])->first();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUserLogged()
    {
        $user = User::where('email', session('email.peserta'))->first();
        return $user;
    }

    public static function getLastPayment()
    {
        $bayar = Bayar::where(['email' => session('email.peserta'),['flag','<',2]])->first();
        $bayar->user = User::where('email', $bayar->email)->first();
        return $bayar;
    }

    public static function isChecked()
    {
        // select bayar order by desc
        $bayar = Bayar::where(['email' => session('email.peserta'),['flag','<',2]])->first();
        if ($bayar) {
           return true;
        } else {
            return false;
        }
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'kelamin',
        'telp',
        'instansi',
        'isVerified'
    ];

    // visible

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
