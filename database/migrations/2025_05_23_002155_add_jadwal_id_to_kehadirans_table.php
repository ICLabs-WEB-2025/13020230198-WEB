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
    Schema::table('kehadirans', function (Blueprint $table) {
        $table->unsignedBigInteger('jadwal_id')->after('anggota_id');

        // Jika ingin pakai relasi foreign key:
        $table->foreign('jadwal_id')->references('id')->on('jadwals')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('kehadirans', function (Blueprint $table) {
        $table->dropForeign(['jadwal_id']);
        $table->dropColumn('jadwal_id');
    });
}

};
