<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $primaryKey = 'idTugas';
    protected $guarded = [];

    protected $appends = ['collect','diffDeadline'];

    public function getCollectAttribute(){
        // get max jawab from this idTugas
        return  Jawab::where(['idTugas'=>$this->idTugas,'email'=>session()->get("email.peserta")])->max("created_at");

    }

    public function getDiffDeadlineAttribute(){
        // cek deadline diff hari
        $now = date("Y-m-d H:i:s");
        $diff = strtotime($this->deadline) - strtotime($now);
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
            return 'waktu habis';
        }
    }
}
