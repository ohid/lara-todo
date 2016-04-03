<div class="modal fade" id="deleteModal-{{ $todo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalDelete-{{ $todo->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        {!!Form::open(['method' => 'delete', 'route' => ['todo.destroy', $todo->id], 'class' => 'todo_delete_form']) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalDelete-{{ $todo->id }}">Delete Todo</b> </h4>
        </div>
        <div class="modal-body">

            Are you sure you want to delete <b>{{ $todo->name }}</b>?

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary todo-delete-button">Delete</button>
        </div>

        {!! Form::close() !!}

        </div>
    </div>
</div>