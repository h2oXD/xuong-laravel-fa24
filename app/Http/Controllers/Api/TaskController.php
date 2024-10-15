<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($projectId)
    {
        return Project::find($projectId)->tasks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request,$projectId)
    {
        $project = Project::find($projectId);   
        $tasks = $project->tasks()->create($request->all());
        return response()->json([
            'tasks' => $tasks,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);   
        $tasks = $project->tasks;
        return response()->json([
            'tasks' => $tasks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);   
        $tasks = $project->tasks()->update($request->all());
        return response()->json([
            'tasks' => $tasks,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $tasks = $project->tasks()->delete();
        return response()->noContent();
    }
}
