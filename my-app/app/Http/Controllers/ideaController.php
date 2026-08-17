<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeIdeaRequest;
use App\Models\Idea;
use App\Notifications\IdeaPublished;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ideaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Auth::user()->ideas()->when(request('state'), function ($query, $state) {
            $query->where(['state' => $state]);
        })->get();

        return view('ideas.index', ['ideas' => $ideas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeIdeaRequest $request)
    {

        $idea = Auth::user()->ideas()->create([
            'description' => $request->validated('description'),
            'state' => 'pending',
        ]);

        Auth::user()->notify(new IdeaPublished($idea));

        return redirect("/ideas");
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        Gate::authorize('modify', $idea);

        return view('ideas.show', ['idea' => $idea]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        Gate::authorize('modify', $idea);
        return view('ideas.edit', ['idea' => $idea]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeIdeaRequest $request, Idea $idea)
    {
        Gate::authorize('modify', $idea);
        $idea->update([
            'description' => $request->validated('description'),
        ]);

        return redirect('/ideas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        Gate::authorize('modify', $idea);
        $idea->delete();

        return redirect('/ideas');
    }
}
