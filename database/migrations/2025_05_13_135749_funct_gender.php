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


            CREATE FUNCTION ketGender(jk CHAR(1)) RETURNS VARCHAR(20)
            DETERMINISTIC
            BEGIN
                IF jk = 'L' THEN
                    RETURN 'Laki-laki';
                ELSEIF jk = 'P' THEN
                    RETURN 'Perempuan';
                END IF;
            END;

        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP FUNCTION IF EXIST ketGender;");
    }
};
