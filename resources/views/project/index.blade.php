@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Список проектов</div>
                    <div class="panel-body">
                        @include('alerts')
                        <div class="list-group">
                            <a href="{{route('project.create')}}" class="list-group-item list-group-item-success">
                                <span class="glyphicon glyphicon-plus"></span>
                                <span>Добавить проект</span>
                            </a>
                            @foreach($projects as $project)
                                <a href="{{route('project.show',['project' => $project])}}" class="list-group-item">{{$project->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
