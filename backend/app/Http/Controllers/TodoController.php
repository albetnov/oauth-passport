<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'success fetch todo data',
            'todos' => Todo::all(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $data = $request->validated();
        try {
            $todo = Todo::create($data);
            return response()->json(['message' => 'success inserting todo.', 'data' => $todo], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'error inserting todo.'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return response()->json(['message' => 'todo', 'data' => $todo], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $data = $request->validated();

        try {
            $todo->update($data);
            return  response()->json(['message' => 'success update todo', 'data' => $todo], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'failed update todo'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        try {
            $todo->delete();
            return response()->json(['message' => 'bye todo'], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'failed delete todo'], 500);
        }
    }
}
