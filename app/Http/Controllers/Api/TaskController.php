<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiTaskRequest;
use App\Models\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('order')->where('deadline','>=', '2021-04-22')->get();
        return response()->json($tasks,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiTaskRequest $request)
    {
        $task = Task::create($request->all());
        return response()->json($task,201);//201 - значит что создана
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json(['error' => true, 'message' => 'Not found'],404);
        }
        return response()->json($task,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiTaskRequest $request, $id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json(['error' => true, 'message' => 'Not found'],404);
        }

        $task->update($request->all());
        return response()->json($task,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json(['error' => true, 'message' => 'Not found'],404);
        }

        $task->delete();
        return response()->json($task,204);//204 - значит что успешно удален "No content"
    }
}
