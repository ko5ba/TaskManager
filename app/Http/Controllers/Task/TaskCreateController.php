<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskCreateController extends Controller
{
    public function __invoke()
    {
        return inertia('Task/Create');
    }
}
