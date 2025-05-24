<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        $table->enum('jenis', ['Latihan', 'Pertandingan']);
        $table->date('tanggal');
        $table->time('waktu');
        $table->string('tempat');
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
