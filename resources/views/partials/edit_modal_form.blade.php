    {{ Form::model($todo, [
      'method' => 'put', 
      'route' => ['todo.update', $todo->id], 
      'class' => 'todos_update_form']) }}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update <b>"{{ $todo->name }}"</b></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">                          
          {{ Form::label('name') }}
          {{ Form::text('name', null, ['class' => 'form-control update-todo-name']) }}
        </div>

        <div class="form-group">                          
          {{ Form::label('description') }}
          {{ Form::textarea('description', null, ['class' => 'form-control update-todo-description']) }}
        </div>

        <div class="form-error form-group">
            
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary todo-update-button">Update</button>
      </div>

      {{ Form::close() }}
