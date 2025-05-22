<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKeteranganToSiswasTable extends Migration
{
    public function up()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('keterangan')->nullable()->after('gender');
        });
    }

    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
    }
}
