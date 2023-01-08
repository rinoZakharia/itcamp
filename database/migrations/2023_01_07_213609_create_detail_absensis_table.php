<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_absensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('absensi_id');
            $table->foreign('absensi_id')->references('id')->on('absensis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email');
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('review')->nullable();
            $table->text('kesan')->default('Belum ada kesan dan saran');
            $table->text('screenshoot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_absensis');
    }
};
