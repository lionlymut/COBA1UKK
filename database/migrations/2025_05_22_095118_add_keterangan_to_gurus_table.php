<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKeteranganToGurusTable extends Migration
{
    public function up()
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->string('keterangan')->nullable()->after('gender');
        });
    }

    public function down()
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
    }
}
