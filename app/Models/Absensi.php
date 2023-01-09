<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $appends = ['diffDeadline','collect'];
    protected $fillable = [
        'judul',
        'mulai',
        'selesai'
    ];

    public function getCollectAttribute(){
        if(session()->get("email.peserta")){
            if(DetailAbsensi::where(["email"=>session()->get("email.peserta"),'absensi_id'=>$this->id])->first()){
                return true;
            }
            return false;
        }else{
            return false;
        }
    }


    public function getDiffDeadlineAttribute(){
        // cek deadline diff hari
        if($this->selesai < now()){
            return 'Waktu Habis';
        }
        $now = date("Y-m-d H:i:s");
        $diff = strtotime($this->selesai) - strtotime($now);
        //  if detik > 0 return diff . ' hari lagi';
        if($diff > 60*60*24){
            $diff = round($diff / (60*60*24));
            return $diff . ' hari lagi';
        }
        elseif($diff > 3600){
            $diff = round($diff / 3600);
            return $diff . ' jam lagi';
        }elseif($diff > 60){
            $diff = round($diff / 60);
            return $diff . ' menit lagi';
        }else{
            return 'Waktu habis';
        }
    }
}
