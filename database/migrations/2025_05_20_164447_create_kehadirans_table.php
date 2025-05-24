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
    Schema::create('kehadirans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('anggota_id')->constrained()->onDelete('cascade');
        $table->foreignId('jadwal_id')->constrained()->onDelete('cascade');
        $table->enum('status', ['Hadir', 'Tidak Hadir', 'Izin']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
