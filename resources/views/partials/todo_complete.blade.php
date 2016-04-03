{!! Form::open(['url' => ['/todo/complete_todo', $todo->id], 'method' => 'post']) !!}
  <button type="submit" class="btn btn-default btn-sm mark-completed"
  @if($todo->completed) 
      disabled 
    @endif
  >
    @if($todo->completed) 
      completed 
    @else 
      Mark as completed 
    @endif
  </button>                      
{!! Form::close() !!}