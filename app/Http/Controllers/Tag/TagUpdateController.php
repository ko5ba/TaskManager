<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('tags.index');
    }
}
