@if($todo->completed)
    {!! Form::open(['url' => ['/todo/uncomplete_todo', $todo->id], 'method' => 'post']) !!}
      <button type="submit" class="btn btn-default btn-sm uncomplete"> completed </button>
    {!! Form::close() !!}
@else 
    {!! Form::open(['url' => ['/todo/complete_todo', $todo->id], 'method' => 'post']) !!}
      <button type="submit" class="btn btn-default btn-sm mark-completed">Mark as completed </button>
    {!! Form::close() !!}
@endif
                        
