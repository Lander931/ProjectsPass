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
                    <div>
                        <i class="fa fa-user icon-access" aria-hidden="true"></i><span>{{$access->login}}</span></div>
                    <div>
                        <i class="fa fa-unlock-alt icon-access" aria-hidden="true"></i><span>{{decrypt($access->password)}}</span>
                    </div>
                </td>
                <td width="40px">
                    <a style="margin-bottom: 2px" href="" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal"
                            data-target="#modalDeleteNote"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>