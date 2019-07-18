<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        
        CREATE TRIGGER category_slug_on_insert
        before INSERT
        ON `categories`
        FOR EACH ROW
        begin
            set new.slug = NAME_SLUG(NEW.name);
        end
        
        ');
        DB::unprepared('
        
        CREATE TRIGGER category_slug_on_update
        before update
        ON `categories`
        FOR EACH ROW
        begin
            set new.slug = NAME_SLUG(NEW.name);
        end
        
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
        drop trigger category_slug_on_insert;
        ');
        DB::unprepared('
        drop trigger category_slug_on_update;
        ');

    }
}
