<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Note;
use App\Http\Requests;

class NotesController extends Controller
{

    public function __construct(Todo $todos, Note $notes) 
    {
        $this->todos = $todos;
        $this->notes = $notes;
    }


    public function writeNote(Requests\NoteCreateRequest $request, $todo_id) 
    {
        $todo = $this->todos->find($todo_id);

        if($todo) {
            $note = $this->notes->create($request->all());
            $todo->notes()->attach($note->id);
            return \Response::json(array('success' => 'You have successfully wrote your note', 'note' => $note));
        } else {
            return \Response::json(array('success' => 'Sorry, Something went wrong. Please try again'));
        }
    }

    public function deleteNote(Request $request, $id)
    {

        $todo_id = $request->get('todo');
        $todo = $this->todos->findorfail($todo_id);

        $note = $this->notes->findorfail($id);
        $todo->notes()->detach($id);
        $note->delete();

        
        return \Response::json(array('success' => 'Your note has been deleted'));

    }
}
