<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerKeteranganOnGurus extends Migration
{
    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_before_insert_gurus');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_before_update_gurus');

        DB::unprepared('
            CREATE TRIGGER trg_before_insert_gurus
            BEFORE INSERT ON gurus
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

        DB::unprepared('
            CREATE TRIGGER trg_before_update_gurus
            BEFORE UPDATE ON gurus
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
        DB::unprepared('DROP TRIGGER IF EXISTS trg_before_insert_gurus');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_before_update_gurus');
    }
}
