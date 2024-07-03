<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagStoreController extends Controller
{
    public function __invoke(StoreRequest $request, Tag $tag)
    {
        $tag->create($request->validated());
        return redirect()->route('tags.index');
    }
}
