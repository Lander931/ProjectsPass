<div class="modal fade" id="modalDeleteProject{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteProject{{$project->id}}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Вы действительно хотите удалить прокт <b>{{$project->name}}</b> и все привязанные доступы/заметки?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
                <form style="display: inline;" class="form-horizontal" method="post" action="{{route('project.destroy',['project' => $project])}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
