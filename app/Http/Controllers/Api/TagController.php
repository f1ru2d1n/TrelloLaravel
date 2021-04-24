<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiTagRequest;
use App\Http\Requests\ApiTaskRequest;
use App\Models\Tag;
use App\Models\Task;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::get();
        return response()->json($tags,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiTagRequest $request)
    {
        $tag = Tag::create($request->validated());
        return response()->json($tag,201);//201 - значит что создана
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        if (is_null($tag)) {
            return response()->json(['error' => true, 'message' => 'Not found'],404);
        }
        return response()->json($tag,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiTagRequest $request, $id)
    {
        $tag = Tag::find($id);
        if (is_null($tag)) {
            return response()->json(['error' => true, 'message' => 'Not found'],404);
        }

        $tag->update($request->validated());
        return response()->json($tag,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (is_null($tag)) {
            return response()->json(['error' => true, 'message' => 'Not found'],404);
        }

        $tag->delete();
        return response()->json($tag,204);//204 - значит что успешно удален "No content"
    }
}
