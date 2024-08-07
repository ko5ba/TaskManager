<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return inertia('Tag/Show', compact('tag'));
    }
}
