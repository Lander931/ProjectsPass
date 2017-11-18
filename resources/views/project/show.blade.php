@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{route('project.index')}}" class="link-back">
                            <span class="glyphicon glyphicon-menu-left"></span>
                        </a>
                        <b>{{$project->name}}</b>
                        <div class="pull-right">
                            <a href="{{route('project.edit',['project' => $project])}}" class="btn btn-default btn-xs">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                    data-target="#modalDeleteProject{{$project->id}}"><span class="glyphicon glyphicon-trash"></span>
                            </button>
                            @include('project.modal-delete',['project' => $project])
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('alerts')

                        @if(!is_null($project->description))
                            <div class="panel panel-default">
                                <div class="panel-heading">Описание проекта</div>
                                <div class="panel-body">
                                    <p>{{$project->description}}</p>
                                </div>
                            </div>
                        @endif
                        @if(count($notes))
                            @include('note.index')
                        @else
                            <a href="{{route('note.create',['project' => $project])}}" class="btn btn-success btn-sm"
                               style="margin-bottom: 15px">
                                <span class="glyphicon glyphicon-plus"></span> Добавить заметку
                            </a>
                        @endif
                        @if(count($accesses))
                            @include('access.index')
                        @else
                           <a href="{{route('access.create',['project' => $project])}}" class="btn btn-success btn-sm"
                               style="margin-bottom: 15px">
                                <span class="glyphicon glyphicon-plus"></span> Добавить доступ
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection