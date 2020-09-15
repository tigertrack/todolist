<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create([
            'section_id' => $request->section_id,
            'title' => $request->title,
            'description' => ($request->description) ? $request->description : ''
        ]);

        return response()->json(['message' => 'Task successfully created.'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        if($request->title)
            $task->title = $request->title;
        if($request->description)
            $task->description = $request->description;
        if($request->section_id)
            $task->section_id = $request->section_id;

        return response()->json(['message' => 'Task successfully updated.'], 202);
    }

    public function change(Task $task)
    {
        $task->state = !$task->state;
        $task->save();
        $state_string = ($task->state) ? "Done" : "Todo";
        return response()->json(['message' => "Task state successfully updated to $state_string"], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['message' => 'Task successfully deleted.'], 200);
    }
}
