<div class="modal fade" id="modalDeleteAccess{{$access->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteAccess{{$access->id}}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Вы действительно хотите удалить доступ <b>{{$access->type}}</b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
                <form style="display: inline;" class="form-horizontal" method="post" action="{{route('access.destroy',['project' => $project, 'access' => $access])}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
