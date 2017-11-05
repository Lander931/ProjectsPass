<?php

namespace App\Http\Controllers;

use App\Note;
use App\Project;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        if (\Auth::user()->can('pageCreate', [Note::class, $project])) {
            return view('note.create', ['project' => $project]);
        } else {
            request()->session()->flash('error', 'Доступ запрещён!');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Project $project
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        if (\Auth::user()->can('create', [Note::class, $project])) {
            $this->validate($request, [
                'text' => 'required|max:255',
            ]);

            $project->notes()->create(['text' => $request->text, 'user_id' => $project->user_id]);

            request()->session()->flash('status', 'Создана заметка');
            return redirect()->route('project.show', ['project' => $project]);
        } else {
            request()->session()->flash('error', 'Доступ запрещён!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @param  \App\Note $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Note $note)
    {
        if (\Auth::user()->can('pageEdit', [$note, $project])) {
            return view('note.edit', ['project' => $project, 'note' => $note]);
        } else {
            request()->session()->flash('error', 'Доступ запрещён!');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Project $project
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Note $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Note $note)
    {
        if (\Auth::user()->can('update', [$note, $project])) {
            $this->validate($request, [
                'text' => 'required|max:255',
            ]);

            $note->update(['text' => $request->text]);

            request()->session()->flash('status', 'Заметка отредактирована');
            return redirect()->route('project.show', ['project' => $project]);
        } else {
            request()->session()->flash('error', 'Доступ запрещён!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @param  \App\Note $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Note $note)
    {
        if (\Auth::user()->can('delete', [$note, $project])) {

            $note->delete();

            request()->session()->flash('status', 'Заметка удалена');
        } else {
            request()->session()->flash('error', 'Доступ запрещён!');
        }
        return redirect()->route('project.show',['project' => $project]);
    }
}
