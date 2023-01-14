<?php

namespace App\Observers;

use App\Models\Jawab;
use App\Models\Tugas;
use Revolution\Google\Sheets\Facades\Sheets;

class TugasObserver
{
    /**
     * Handle the Tugas "created" event.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return void
     */
    public $columnHeader =[[
        'Email',
        'Nama',
        'Tanggal Pengumpulan',
        'Jawaban',
        'Nilai',
    ]];
    public function created(Tugas $tugas)
    {

    }

    public function updated(Tugas $tugas)
    {

    }

}
