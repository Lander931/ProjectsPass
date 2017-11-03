@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Список проектов</div>
                    <div class="panel-body">
                        @include('errors')
                        <div class="list-group">
                            <a href="{{route('project.create')}}" class="list-group-item list-group-item-success">
                                <span class="glyphicon glyphicon-plus"></span>
                                <span>Добавить проект</span>
                            </a>
                            <a href="#" class="list-group-item">hotelburst.com</a>
                            <a href="#" class="list-group-item">jenskiy-mir.com</a>
                            <a href="#" class="list-group-item">stixi-poeti.ru</a>
                            <a href="#" class="list-group-item">spike.su</a>
                            <a href="#" class="list-group-item">samplepro.ru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
