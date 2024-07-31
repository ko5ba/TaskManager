<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return inertia('Tag/Index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Tag/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Tag $tag)
    {
        $tag->create($request->validated());
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return inertia('Tag/Show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return inertia('Tag/Edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
