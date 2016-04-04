  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><b>{{ $todo->name }}</b></h4>
  </div>
  <div class="modal-body">
    
    {{ $todo->description }}
    
    <br>
    <hr>
    
    <h4>Your notes on <b>{{ $todo->name }}</b></h4>

    <div class="all-todo-notes">        
        <!-- Single note -->
        @if(count($todo->notes))
          <br>
          @foreach($todo->notes as $note)
              <div class="row single-note">
                <div class="col-md-2">
                  <img src="{{ Auth::user()->gravaterImage() }}" alt="" class="img-responsive">
                </div>
                <div class="col-md-9">
                  <div class="note_body">
                      {{$note->body}}
                  </div>
                </div>
              {!! Form::open(['url' => "todo/delete_note/{$note->id}", 'method' => 'post', 'class' => 'delete_note_form']) !!}
                  <input type="hidden" name="todo" value="{{ $todo->id }}">
                  <button type="submit" class="delete_note"><i class="fa fa-times"></i></button>
              {!! Form::close() !!}
              </div>
          @endforeach
        @else
            <small class="no-todo">Currently you have to notes to show</small>
            <hr>
            <br>
        @endif
    </div>


    <div class="write-note">
        <h4>Write a new note</h4>
        {!! Form::open(['url' => 'todo/write_note/' . $todo->id, 'method' => 'post', 'class' => 'note_form']) !!}
            <div class="form-group">
                {!! Form::textarea('body', null,  ['class' => 'form-control note-body']) !!}
            </div>

            <div class="form-error"></div>

            {!! Form::submit('Write note', ['class' => 'btn btn-primary note_form_btn']) !!}
        {!! Form::close() !!}
    </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>