<div class="panel panel-default">
    <div class="panel-heading">
        Заметки
        <div class="pull-right">
            <a href="{{route('note.create',['project' => $project])}}" class="btn btn-success btn-xs">
                <span class="glyphicon glyphicon-plus"></span>
            </a>
        </div>
    </div>

    <ul class="list-group">
        @foreach($notes as $note)
            <li class="list-group-item">
                {{$note->text}}
                <div class="pull-right">
                    <a href="{{route('note.edit',['note' => $note, 'project' => $project])}}" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal"
                            data-target="#modalDeleteNote{{$note->id}}"><span class="glyphicon glyphicon-trash"></span></button>
                    @include('note.modal-delete',['project' => $project,'note' => $note])
                </div>
            </li>
        @endforeach
    </ul>
</div>
