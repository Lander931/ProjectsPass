<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::query()->where('user_id',\Auth::user()->id)->get(['id','name']);
        return view('project.index',['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $project = \Auth::user()->projects()->create(
            [
                'name' => $request->name,
                'description' => $request->description,
            ]
        );
        $request->session()->flash('status', 'Добавлен новый проект: ' . $project->name);
        return redirect()->route('project.show',['project' => $project]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        if (\Auth::user()->can('view', $project)){
            return view('project.show',['project' => $project]);
        } else{
            request()->session()->flash('error','Доступ запрещён!');
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit',['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if (\Auth::user()->can('update',$project)){
            $this->validate($request,[
                'name' => 'required'
            ]);
            $project->update(['name' => $request->name,'description' => $request->description]);
            request()->session()->flash('status','Проект обновлён');
            return redirect()->route('project.show',['project' => $project]);
        }else{
            request()->session()->flash('error','Доступ запрещён!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if (\Auth::user()->can('delete',$project)){
            $project->delete();
            request()->session()->flash('status',"Проект '$project->name' удалён");
            return redirect()->route('project.index');
        }else{
            request()->session()->flash('error','Доступ запрещён!');
            return back();
        }
    }
}
