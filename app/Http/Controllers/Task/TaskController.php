<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function Termwind\ask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::query()
            ->where('is_ready', false)
            ->orderBy('date_deadline', 'asc')
            ->orderBy('time_deadline', 'asc')
            ->get();
        return inertia('Task/Index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Task/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Task $task)
    {
        $task->create($request->validated());
        return to_route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        if ($task->time_deadline) {
            $task->time_deadline = Carbon::createFromFormat('H:i:s', $task->time_deadline)->format('H:i');
        }
        return inertia('Task/Show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return inertia('Task/Edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Task $task)
    {
        $task->update($request->validated());
        return to_route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function indexReadyTask()
    {
        $tasks = Task::query()
            ->where('is_ready', true)
            ->orderBy('date_deadline', 'asc')
            ->orderBy('time_deadline', 'asc')
            ->get();
        
        return inertia('Task/IndexReadyTask', [
            'tasks' => $tasks
        ]);
    }

    public function addReadyTask(Task $task)
    {
        $task->is_ready = true;
        $task->save();

        return redirect()->route('tasks.index.ready');
    }

    public function showReadyTask(Task $task)
    {
        $date = $task->updated_at;
        $dateNew = Carbon::parse($date);
        $formattedDate = $dateNew->format('d M H:i');
        
        return inertia('Task/ShowReadyTask', [
            'task' => $task,
            'formattedDate' => $formattedDate
        ]);
    }
}
