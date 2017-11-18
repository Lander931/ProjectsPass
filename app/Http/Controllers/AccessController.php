<?php

namespace App\Http\Controllers;

use App\Access;
use App\Project;
use Illuminate\Http\Request;

class AccessController extends Controller
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
        if (\Auth::user()->can('pageCreate', [Access::class, $project])) {
            return view('access.create', ['project' => $project]);
        }
        request()->session()->flash('error','Доступ запрещён!');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        if (\Auth::user()->can('create',[Access::class,$project])){
            $this->validate($request,[
                'type' => "required|max:50",
                'login' => "required|max:50",
                'password' => "required",
                'comment' => "max:255",
            ]);
            $project->accesses()->create([
                'type' => $request->type,
                'login' => $request->login,
                'password'=> encrypt($request->password),
                'comment' => $request->comment,
                'user_id' => $project->user_id,
            ]);
            request()->session()->flash('status','Добавлен доступ');
            return redirect()->route('project.show',['project' => $project]);
        }
        request()->session()->flash('error','Доступ запрещён!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Access $access
     * @return \Illuminate\Http\Response
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Access $access
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Access $access)
    {
        if (\Auth::user()->can('pageEdit', [$access, $project])){
            return view('access.edit', ['project' => $project,'access' => $access]);
        }
        request()->session()->flash('error','Доступ запрещён!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Access $access
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Access $access)
    {
        if (\Auth::user()->can('update',[$access, $project])){
            $this->validate($request,[
                'type' => "required|max:50",
                'login' => "required|max:50",
                'password' => "required",
                'comment' => "max:255",
            ]);
            $access->update([
                'type' => $request->type,
                'login' => $request->login,
                'password'=> encrypt($request->password),
                'comment' => $request->comment,
            ]);
            request()->session()->flash('status','Доступ изменён');
            return redirect()->route('project.show',['project' => $project]);
        }
        request()->session()->flash('error','Доступ запрещён!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Access $access
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Access $access)
    {
        if (\Auth::user()->can('delete',[$access,$project])){
            $access->delete();
            request()->session()->flash('status','Доступ удалён');
        } else {
            request()->session()->flash('error','Доступ запрещён!');
        }
        return redirect()->route('project.show',['project' => $project]);
    }
}
