<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('JWT', ['only' => ['store', 'update', 'destroy']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection|Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::first()->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
//        Category::create($request->all());
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return response('created');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     *
     * @return CategoryResource|Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     *
     * @return Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param Category $category
     *
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response('Updated.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     *
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response('Deleted');
    }
}
