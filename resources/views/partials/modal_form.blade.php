    
    {{ Form::open([
      'method' => 'post', 
      'route' => 'todo.store', 
      'class' => 'todos_create_form']) }}

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create a new To do</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">                          
          {{ Form::label('name') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">                          
          {{ Form::label('description') }}
          {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-error form-group">

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary todo-create-button">Create</button>
      </div>

      {{ Form::close() }}
