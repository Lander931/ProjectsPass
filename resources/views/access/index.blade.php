@section('script')
    <script>
        $('.crypt').click(function () {
            $('.crypt').css('display','none');
            $('.decrypt').css('display','inline-block');
        });
        $('.decrypt').click(function () {
            $('.decrypt').css('display','none');
            $('.crypt').css('display','inline-block');
        });
    </script>
@endsection

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
                <td>{{$access->type}}</td>
                <td>{{$access->login}}</td>
                <td><span class="crypt">********</span><span class="decrypt"
                                                             style="display: none">{{decrypt($access->password)}}</span>
                </td>
                <td>{{$access->comment}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>