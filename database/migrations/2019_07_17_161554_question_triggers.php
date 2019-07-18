<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER question_slug_on_insert
        before INSERT
        ON `questions`
        FOR EACH ROW
        begin
            set new.slug = NAME_SLUG(NEW.title);
        end
        ');
        DB::unprepared('
        
        CREATE TRIGGER question_slug_on_update
        before update
        ON `questions`
        FOR EACH ROW
        begin
            set new.slug = NAME_SLUG(NEW.title);
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
        drop trigger question_slug_on_insert;
        ');
        DB::unprepared('
        drop trigger question_slug_on_update;
        ');

    }
}
