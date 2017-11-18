<div class="panel panel-default">
    <div class="panel-heading">
        Доступы
        <div class="pull-right">
            <a href="{{route('access.create',['project' => $project])}}" class="btn btn-success btn-xs">
                <span class="glyphicon glyphicon-plus"></span>
            </a>
        </div>
    </div>
    <table class="table">
        <tbody>
        @foreach($accesses as $access)
            <tr>
                <td>
                    <div><b>{{$access->type}}</b></div>
                    <div style="font-size:70%; color: gray">{{$access->comment}}</div>
                </td>
                <td>
                    {{--<div>--}}
                    {{--<i class="fa fa-user icon-access" aria-hidden="true"></i><span>{{$access->login}}</span>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <input id="login{{$access->id}}" type="text" name="password" class="form-control" value="{{$access->login}}">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default btn-copy" data-clipboard-target="#login{{$access->id}}"><span
                                            class="fa fa-clone"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                            <input id="password{{$access->id}}" type="text" name="password" class="form-control" value="{{decrypt($access->password)}}">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default btn-copy" data-clipboard-target="#password{{$access->id}}"><span
                                            class="fa fa-clone"></span></button>
                            </div>
                        </div>
                    </div>
                </td>
                <td width="40px">
                    <a style="margin-bottom: 2px" href="{{route('access.edit', ['access' => $access, 'project' => $project,])}}" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal"
                            data-target="#modalDeleteAccess{{$access->id}}"><span class="glyphicon glyphicon-trash"></span></button>
                    @include('access.modal-delete',['project' => $project, 'access' => $access])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@section('script')
    <script src="{{asset('js/clipboard.min.js')}}"></script>
    <script>
        new Clipboard('.btn-copy');
    </script>
@endsection