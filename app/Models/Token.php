<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $fillable = ['token', 'email', 'isUsed', 'type'];

    public function peserta()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public static function getTokenByEmailRegister($email)
    {
        return Token::where('email', $email)->where([
            ['isUsed', '=', false],
            ['type', '=', 'register']
        ])->first();
    }

    public static function generateToken()
    {
        $token = bin2hex(random_bytes(32));
        return $token;
    }


    public static function requestTokenRegister($email)
    {
        //   if already another token with type register not delete it
        $token = Token::where('email', $email)->where([
            ['isUsed', '=', false],
            ['type', '=', 'register']
        ])->update(['isUsed' => true]);

        $token = Token::create([
            'token' => Token::generateToken(),
            'email' => $email,
            'isUsed' => false,
            'type' => 'register'
        ]);

        return $token;
    }


    public static function requestTokenResetPassword($email)
    {
        //   if already another token with type register not delete it
        Token::where('email', $email)->where([
            ['type', '=', 'resetPassword']
        ])->delete();

        $token = Token::create([
            'token' => Token::generateToken(),
            'email' => $email,
            'isUsed' => false,
            'type' => 'resetPassword'
        ]);

        return $token;
    }

    public static function acceptToken($token)
    {
        $data = Token::where('token', $token)->first();
        if ($data) {
            $data->isUsed = true;
            $data->save();
            if ($data->type == 'register') {
                $peserta = User::where('email', $data->email)->first();
                $peserta->isVerified = true;
                $peserta->save();
            }
            return true;
        }
        return false;
    }

    public static function getTokenByEmailReset($email)
    {
        return Token::where('email', $email)->where([
            ['isUsed', '=', false],
            ['type', '=', 'reset']
        ])->first();
    }
}
