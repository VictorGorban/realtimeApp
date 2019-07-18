<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerVotesTable extends Migration
{
    //todo: Кроме вопросов и ответов, нужны еще комментарии. И к вопросам, и к ответам. И голоса на них. Похоже на еще 2+2 таблицы.

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('answer_id');
            $table->unsignedInteger('user_id');
            $table->boolean('is_vote_up')->default(true);
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_votes');
    }
}
