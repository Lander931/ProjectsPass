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
                            <a href="{{route('project.edit',['project' => $project])}}" class="btn btn-primary btn-xs">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <form style="display: inline;" class="form-horizontal" method="post" action="{{route('project.destroy',['project' => $project])}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('alerts')
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p>{{$project->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection