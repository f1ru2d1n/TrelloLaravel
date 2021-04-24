<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiDeskListRequest;
use App\Http\Resources\DeskListResource;
use App\Models\DeskList;

class DeskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $deskLists = DeskList::orderBy('order')->where(function ($query) {
            $query->select('deadline')
                ->from('tasks')
                ->whereColumn('tasks.desk_list_id', 'desk_lists.id')
                ->limit(1);
        }, '>', '2021-04-23')->get();

        return response()->json($deskLists,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiDeskListRequest $request)
    {
        $deskList = DeskList::create($request->validated());
        return response()->json($deskList,201);//201 - значит что создана
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desklist = DeskList::find($id);
        if (is_null($desklist)) {
            return response()->json(['error' => true, 'message' => 'Not found'],404);
        }
        return response()->json($desklist,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiDeskListRequest $request, $id)
    {
        $deskList = DeskList::find($id);
        if (is_null($deskList)) {
            return response()->json(['error' => true, 'message' => 'Not found'],404);
        }

        $deskList->update($request->validated());
        return response()->json($deskList,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deskList = DeskList::find($id);
        if (is_null($deskList)) {
            return response()->json(['error' => true, 'message' => 'Not found'],404);
        }

        $deskList->delete();
        return response()->json($deskList,204);//204 - значит что успешно удален "No content"
    }
}
