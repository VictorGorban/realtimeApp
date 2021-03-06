<?php

use App\Model\AnswerVote;
use App\Model\Question;
use App\Model\Answer;
use App\Model\QuestionVote;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        echo "Users faking finished \n";

        factory(Question::class, 50)->create();
        echo "Questions faking finished \n";

        // make n question_votes
        factory(QuestionVote::class, 250)->create();
        echo "Question votes faking finished \n";

        $answers = factory(Answer::class, 250)->create();
        echo "Answers faking finished \n";

        // for each answer make rand 1..n answer_votes and save it (create = make+save)
        $answers->each(function (Answer $answer) {
            $vote_count = rand(1,5);
            return $answer->votes()->saveMany(
                factory(AnswerVote::class, $vote_count)->make()
            );
        });
        echo "Answer votes faking finished \n";

    }
}
