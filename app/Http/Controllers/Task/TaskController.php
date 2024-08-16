<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

use function Termwind\ask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tag $tag)
    {
        $tasks = Task::query()
            ->where('is_ready', false)
            ->where('user_id', auth()->id())
            ->orderBy('date_deadline', 'asc')
            ->orderBy('time_deadline', 'asc')
            ->get();
        
        return inertia('Task/Index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return inertia('Task/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Task $task)
    {
        $data = $request->validated();
        $task->fill($data);
        $task->user_id = auth()->id();
        $task = $task->save();

        return redirect()->route('tasks.index');
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
        return inertia('Task/Edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index');
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
            ->where('user_id', auth()->id())
            ->orderBy('date_deadline', 'asc')
            ->orderBy('time_deadline', 'asc')
            ->get();

        $today = Carbon::today();
        $countReadyTask = Task::query()
            ->where('is_ready', true)
            ->where('user_id', auth()->id())
            ->whereDate('created_at', $today)
            ->count();
        
        return inertia('Task/IndexReadyTask', [
            'tasks' => $tasks,
            'countReadyTask' => $countReadyTask
        ]);
    }

    public function addReadyTask(Task $task, User $user)
    {
        $task->is_ready = true;
        $task->save();

        DB::table('daily_completed_tasks')->insert([
            'user_id' => auth()->id(),
            'completed_tasks_count' => 1,
            'created_at' => new DateTime()
        ]);

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
