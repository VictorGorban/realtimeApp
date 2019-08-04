<?php

namespace App\Http\Controllers\api;

use App\Model\Answer;
use App\Model\Question;
use App\Model\QuestionVote;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionVoteController extends Controller
{

    function __construct()
    {
        $this->middleware('JWT', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection|Response
     */
    public function index(Question $question)
    {
        return $question->votes()->get();
    }


    /**
     * @param Question $question
     *
     * @return ResponseFactory|Response
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
     * @return ResponseFactory|Response
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
