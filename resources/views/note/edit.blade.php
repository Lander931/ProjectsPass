@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{route('project.show',['project' => $project])}}" class="link-back">
                            <span class="glyphicon glyphicon-menu-left"></span>
                        </a>
                        Редактирование заметки проекта <b>{{$project->name}}</b>
                    </div>
                    <div class="panel-body">
                        @include('alerts')
                        <form class="form-horizontal" method="post" action="{{route('note.update',['project' => $project,'note' => $note])}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="text" class="col-sm-2 control-label">Текст заметки</label>
                                <div class="col-sm-10">
                                    <textarea  id="text" name="text" class="form-control"
                                              rows="3" required>{{$note->text}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Изменить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection