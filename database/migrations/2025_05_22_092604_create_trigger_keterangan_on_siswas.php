<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerKeteranganOnSiswas extends Migration
{
    public function up()
    {
        // Hapus trigger dulu jika sudah ada
        DB::unprepared('DROP TRIGGER IF EXISTS trg_before_insert_siswas');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_before_update_siswas');

        // Buat trigger sebelum insert
        DB::unprepared('
            CREATE TRIGGER trg_before_insert_siswas
            BEFORE INSERT ON siswas
            FOR EACH ROW
            BEGIN
                IF NEW.gender = "L" THEN
                    SET NEW.keterangan = "Laki-laki";
                ELSEIF NEW.gender = "P" THEN
                    SET NEW.keterangan = "Perempuan";
                ELSE
                    SET NEW.keterangan = "Tidak diketahui";
                END IF;
            END
        ');

        // Buat trigger sebelum update
        DB::unprepared('
            CREATE TRIGGER trg_before_update_siswas
            BEFORE UPDATE ON siswas
            FOR EACH ROW
            BEGIN
                IF NEW.gender = "L" THEN
                    SET NEW.keterangan = "Laki-laki";
                ELSEIF NEW.gender = "P" THEN
                    SET NEW.keterangan = "Perempuan";
                ELSE
                    SET NEW.keterangan = "Tidak diketahui";
                END IF;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_before_insert_siswas');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_before_update_siswas');
    }
}
