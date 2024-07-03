<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagIndexController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tags = Tag::all();
        return inertia('Tag/Index', compact('tags'));
    }
}
