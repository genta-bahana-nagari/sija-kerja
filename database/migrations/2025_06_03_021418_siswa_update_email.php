<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            CREATE TRIGGER siswa_change_email
            AFTER UPDATE ON siswa
            FOR EACH ROW
            BEGIN
                IF NEW.email <> OLD.email THEN
                    UPDATE users
                    SET email = NEW.email
                    WHERE id = NEW.user_id;
                END IF;
                IF NEW.nama <> OLD.nama THEN
                    UPDATE users
                    SET name = NEW.nama
                    WHERE id = NEW.user_id;
                END IF;
            END;
        ");
    }

    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS siswa_change_email;");
    }
};
