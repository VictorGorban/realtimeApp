<?php

namespace App\Http\Controllers;

use App\Model\Answer;
use App\Model\AnswerVote;
use Illuminate\Http\Request;

class AnswerVoteController extends Controller
{

    function __construct()
    {
        $this->middleware('JWT', ['except' => ['index']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index(Answer $answer)
    {
        return $answer->votes()->get();
    }

    /**
     * @param Answer  $answer
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function voteup(Answer $answer)
    {
        //
        $answer->votes()->updateOrCreate(['user_id' => 1 /*auth()->id()*/, 'answer_id' => $answer->id],
                                     ['is_vote_up' => true]
                                 );
        // нормально. А почему не показывается текст - непонятно.
        return response('voted up.');

    }

    /**
     * @param Answer $answer
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function votedown(Answer $answer)
    {
        //
        $answer->votes()->updateOrCreate(['user_id' => 1 /*auth()->id()*/, 'answer_id' => $answer->id],
                                     ['is_vote_up' => false]
                                 );

        return response('voted down.');
    }

}
