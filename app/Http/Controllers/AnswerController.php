<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerResource;
use App\Model\Question;
use App\Model\Answer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{


    function __construct()
    {
        $this->middleware('JWT', ['only' => ['store', 'update', 'destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Question $question)
    {
//        return Answer::first()->get();
        return AnswerResource::collection($question->answers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $question->answers()->create($request->all());
        return response('Stored');
    }

    /**
     * Display the specified resource.
     *
     * @param Answer $answer
     *
     * @return AnswerResource
     */
    public function show(Question $question, Answer $answer)
    {
        // It's OK, we return the answer only if its question_id matches question id.
        if ($answer->question->id == $question->id)
        {
            return new AnswerResource($answer);
        }
        else
        {
            return response('Not found', 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Answer  $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request, Answer $answer)
    {
        if ($answer->question->id == $question->id)
        {
            // wow, so easy to specify what request fields to take...
            $answer->update($request->all(['body',]));
            return response('Updated');
        }
        else
        {
            return response('Not found', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        if ($answer->question->id == $question->id)
        {
            $answer->delete();
            return response('Deleted');
        }
        else
        {
            return response('Not found', 404);
        }
    }
}
