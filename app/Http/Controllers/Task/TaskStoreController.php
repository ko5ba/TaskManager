<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskStoreController extends Controller
{
    public function __invoke(StoreRequest $request, Task $task)
    {
        $task->create($request->validated());
        return to_route('tasks.index');
    }
}
