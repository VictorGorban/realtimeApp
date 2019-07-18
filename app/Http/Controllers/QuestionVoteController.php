<?php

namespace App\Http\Controllers;

use App\Model\Answer;
use App\Model\Question;
use App\Model\QuestionVote;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class QuestionVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return $question->votes()->get();
    }


    /**
     * @param Question $question
     *
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function voteup(Question $question)
    {
        //
        $question->votes()->updateOrCreate(['user_id' => 1 /*auth()->id()*/, 'question_id' => $question->id],
                                           ['is_vote_up' => true]
        );

        return response('voted up.');
    }


    /**
     * @param Question $question
     *
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function votedown(Question $question)
    {
        //
        $question->votes()->updateOrCreate(['user_id' => 1 /*auth()->id()*/, 'question_id' => $question->id],
                                           ['is_vote_up' => false]
        );

        return response('voted down.');
    }
}
