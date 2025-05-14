<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


return new class extends Migration {
    public function up(): void {
        //Triger status siswa
        DB::unprepared('
            CREATE TRIGGER update_status_pkl_after_insert
            AFTER INSERT ON pkls
            FOR EACH ROW
            BEGIN
                UPDATE siswas
                SET status_pkl = true
                WHERE id = NEW.siswa_id;
            END;
        ');
        /// triger duplikat data
    }


    public function down(): void {
        DB::unprepared('DROP TRIGGER IF EXISTS update_status_pkl_after_insert');
    }
};


