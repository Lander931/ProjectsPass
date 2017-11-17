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
                        Новый доступ проекта <b>{{$project->name}}</b>
                    </div>
                    <div class="panel-body">
                        @include('alerts')
                        <form class="form-horizontal" method="post" action="{{route('access.store',['project' => $project])}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="type" class="col-sm-2 control-label">Тип</label>
                                <div class="col-sm-5">
                                    <input type="text" id="type" name="type" class="form-control" placeholder="SSH / FTP / DB и т.п.">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="login" class="col-sm-2 control-label">Логин</label>
                                <div class="col-sm-5">
                                    <input type="text" id="login" name="login" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Пароль</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <input type="text" id="password" name="password" class="form-control">
                                        <div class="input-group-addon"><a href="#" id="generatePass"><span class="glyphicon glyphicon-random"></span></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment" class="col-sm-2 control-label">Комментарий</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
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
@section('script')
    <script src="{{asset('js/PassGenJS.js')}}"></script>
    <script>
        $('#generatePass').click(function(){
            var pass = PassGenJS.getPassword({"score":2});
            $('#password').val(pass);
        });
    </script>
@endsection