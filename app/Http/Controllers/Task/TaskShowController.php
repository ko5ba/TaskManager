<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskShowController extends Controller
{
    public function __invoke(Task $task)
    {
        return inertia('Task/Show', compact('task'));
    }
}
