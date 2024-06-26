<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskIndexController extends Controller
{
    public function __invoke(Task $task)
    {
        $tasks = Task::all();
        return inertia('Task/Index', compact('tasks'));
    }
}
