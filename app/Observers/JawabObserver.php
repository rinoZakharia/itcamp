<?php

namespace App\Observers;

use App\Models\Jawab;
use App\Models\Tugas;
use App\Models\User;
use Revolution\Google\Sheets\Facades\Sheets;

class JawabObserver
{
    /**
     * Handle the Jawab "created" event.
     *
     * @param  \App\Models\Jawab  $jawab
     * @return void
     */

     public $columnHeader =[[
        'Email',
        'Nama',
        'Tanggal Pengumpulan',
        'Jawaban',
        'Nilai',
    ]];
    public function created(Jawab $jawab)
    {
        //

    }

    public function updated(Jawab $jawab)
    {
        //
    }

    /**
     * Handle the Jawab "deleted" event.
     *
     * @param  \App\Models\Jawab  $jawab
     * @return void
     */
    public function deleted(Jawab $jawab)
    {
        //
    }

    /**
     * Handle the Jawab "restored" event.
     *
     * @param  \App\Models\Jawab  $jawab
     * @return void
     */
    public function restored(Jawab $jawab)
    {
        //
    }

    /**
     * Handle the Jawab "force deleted" event.
     *
     * @param  \App\Models\Jawab  $jawab
     * @return void
     */
    public function forceDeleted(Jawab $jawab)
    {
        //
    }
}
