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
    Schema::table('jadwals', function (Blueprint $table) {
        $table->string('jenis')->after('id'); // Anda bisa sesuaikan posisinya
    });
}

public function down()
{
    Schema::table('jadwals', function (Blueprint $table) {
        $table->dropColumn('jenis');
    });
}
};
