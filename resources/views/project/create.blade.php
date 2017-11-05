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
                        Новый проект
                    </div>
                    <div class="panel-body">
                        @include('alerts')
                        <form class="form-horizontal" method="post" action="{{route('project.store')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" class="form-control"
                                              rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Создать</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection