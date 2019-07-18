<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Functions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        DROP FUNCTION IF EXISTS NAME_SLUG;
        CREATE FUNCTION NAME_SLUG(name VARCHAR(255))
        RETURNS varchar(255)
        DETERMINISTIC
        BEGIN
            RETURN LOWER(REPLACE(name, \' \', \'-\'));
        END
        
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::unprepared('
        drop function NAME_SLUG;
        
        ');
    }
}
