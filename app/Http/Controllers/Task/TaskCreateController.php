<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TaskCreateController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tags = Tag::all();
        return inertia('Task/Create', compact('tags'));
    }
}
