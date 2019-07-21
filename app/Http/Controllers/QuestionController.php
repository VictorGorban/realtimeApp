<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('JWT', ['only' => ['store', 'update', 'destroy']]);

    }

    public function index()
    {
        // now each transform of question use QuestionResource
        return QuestionResource::collection(Question::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Question::create($request->all());

        // or, for user that now logged in...
        auth()->user()->question()->create($request->all());

        return response('Stored.', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Question $question
     *
     * @return QuestionResource|\Illuminate\Http\Response
     */
    public function show(Question $question)
    {
//        return $question;
        return new QuestionResource($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Question $question
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Question      $question
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        // done: Преобразовать запрос чтобы сохранять нормальные данные, а то я позволяю изменить время создания и slug, ну это бред!
        $question->update($request->all(['title','body',]));

        return response('Updated.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Question $question
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response('Deleted');
    }
}
