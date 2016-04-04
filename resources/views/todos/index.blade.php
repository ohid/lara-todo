@inject('active', 'App\Http\Utilities\Active')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-2 col-xs-8">
            <h2>To Do List</h2>
        </div>

        <div class="col-md-2 col-xs-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm new-todo pull-right" data-toggle="modal" data-target="#newTodo">
              New todo
            </button>

            @include('partials.modal')
        </div>
    </div>
    

    <!-- Todo shorting -->
    <div class="row " style="margin-top: 30px;">
      <div class="col-md-8 col-md-offset-2 nav-custom">
        <ul class="nav nav-pills nav-justified">
          <li class="{{ $active::set(['todo/all']) }}"><a href="{{ route('todo.all') }}">All Todos</a></li>
          <li class="{{ $active::set(['todo']) }}"><a href="{{ route('todo.index') }}">Current Todos</a></li>
          <li class="{{ $active::set(['todo/completed']) }}"><a href="{{ route('todo.completed') }}">Completed Todos</a></li>
        </ul>
      </div>
    </div> 
  


    <!-- Toto list -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2 outer-table">
        <table class="table table-hover">
          <tr class="table-heading">
              <th width="20%">Name</th>
              <th class="short_description" width="20%">Short Description</th>
              <th width="25%">Created</th>
              <th width="15%">Status</th>
              <th width="25%">Action</th>
          </tr>
          @if(count($todos))
            @foreach($todos as $todo)
              <tr class="todo-{{ $todo->id }}">
                  <td>{{ str_limit($todo->name, 60) }}</td>
                  <td class="short_description">{{ str_limit($todo->description, 30) }}</td>
                  <td>{{ $todo->created_at->diffForHumans() }}</td>
                  <td>
                      @include('partials.todo_complete')
                  </td>
                  <td>
                      @include('partials.modal_actions')
                  </td>
              </tr>
            @endforeach
          @else 
            <tr>
              <td colspan="5" align="center"><b>You have no todo</b></td>
            </tr>
          @endif
        </table>

        {{ $todos->render() }}
      </div>
    </div>


</div>
@stop

@include('partials.flash_message')
