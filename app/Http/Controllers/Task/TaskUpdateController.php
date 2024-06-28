<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Task $task)
    {
        $task->update($request->validated());
        return to_route('tasks.index');
    }
}
