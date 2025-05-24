<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
{
    Schema::table('kehadirans', function (Blueprint $table) {
        $table->unsignedBigInteger('anggota_id')->after('id'); // posisi bisa disesuaikan
    });
}

public function down()
{
    Schema::table('kehadirans', function (Blueprint $table) {
        $table->dropColumn('anggota_id');
    });
}

};
