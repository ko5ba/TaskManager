<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskEditController extends Controller
{
    public function __invoke(Task $task)
    {
        return inertia('Task/Edit', compact('task'));
    }
}
