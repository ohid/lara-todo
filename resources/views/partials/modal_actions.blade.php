<!-- Edit Modal -->
<div class="btn-group">
    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#viewModal-{{ $todo->id }}" title="View">
      <i class="fa fa-eye"></i>
    </button>
    @unless($todo->completed)
    <button type="button" class="btn btn-info btn-sm btn-edit" data-toggle="modal" data-target="#editModal-{{ $todo->id }}" title="Edit">
      <i class="fa fa-pencil"></i>
    </button>    
    @endunless
    <button type="button" class="btn btn-warning btn-sm " data-toggle="modal" data-target="#deleteModal-{{ $todo->id }}" title="Remove">
      <i class="fa fa-times"></i>
    </button>
</div>


<!-- View Todo Modal -->
<div class="modal fade" id="viewModal-{{ $todo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalView-{{ $todo->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        @include('partials.view_modal_form')

        </div>
    </div>
</div>

@unless($todo->completed)
<!-- Edit Todo Modal -->
<div class="modal fade" id="editModal-{{ $todo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalEdit-{{ $todo->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        @include('partials.edit_modal_form')

        </div>
    </div>
</div>
@endunless

<!-- Delete Todo Modal -->
@include('partials.delete_todo_modal')