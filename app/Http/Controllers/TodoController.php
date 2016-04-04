<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use App\Todo;
use App\Note;
use App\User;
use App\Http\Flash as Flash;
use App\Http\Requests;

class TodoController extends Controller
{

    public function __construct(Todo $todos, User $user, Note $note) 
    {
        $this->middleware('auth');
        $this->todos = $todos;
        $this->user = $user;
        $this->note = $note;
        $this->user_id = @\Auth::user()->id;
    }


    /**
     * Display all todos
     *
     * @return \Illuminate\Http\Response
     */
    public function all() 
    {
        return $this->todoStatus('all');
    }

    /**
     * Display a current todos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return $this->todoStatus('current', false);
    }

    /**
     * Display completed todos.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed() 
    {
        return $this->todoStatus('completed', true);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TodosCreateRequest $request)
    {
        \Auth::user()->todos()->create($request->all());
        return \Response::json(array('success' => 'Your todo created successfully'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\TodoUpdateRequest $request, $id)
    {
        $todo = $this->todos->findorfail($id);

        $todo->fill($request->all())->save();

        // dd($todo);
        return \Response::json(array('success' => 'Your todo edited successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id, Flash $flash)
    {
        $todo = $this->todos->find($id);

        if(\Gate::denies('destroy', $todo)) {
            flash('error', 'Error','Sorry, something went wrong, please try again.');
            return redirect()->back();
        }

        if($todo) {
            $todo->notes()->detach();

            $todo->delete();

            flash('success', 'Deleted', 'Todo has been deleted successfully');
            
            return redirect()->back();
        } else {
            flash('error', 'Error','Sorry, something went wrong, please try again.');
            return redirect()->back();
        }
        
    }

    /**
     * Make any todo as completed
     * 
     */
    public function completeTodo($id)
    {
        $todo = Todo::find($id);
        if($todo) {            
            $todo->completed = true;
            $todo->save();
            return \Response::json(array('success' => 'This task is completed'));
        } else {
            return \Response::json(array('error' => 'This task not completed'));
        }
    }

    /**
     * Make completed todo as uncomplete
     * 
     */
    public function uncompleteTodo($id)
    {
        $todo = Todo::find($id);
        if($todo) {            
            $todo->completed = false;
            $todo->save();
            return \Response::json(array('success' => 'This task is completed'));
        } else {
            return \Response::json(array('error' => 'This task not completed'));
        }
    }

    /**
     * Get the sorted status of todo
     * 
     */
    protected function todoStatus($completed, $status = false) 
    {
        $user_id = $this->user_id;

        if($completed === 'all') {

            $todos = $this->todos
                ->where('user_id', $user_id)
                ->orderBy('id', 'DESC')->paginate(15);

            return view('todos.index', compact('todos'));
        } else {
            $todos = $this->todos
                ->where('user_id', $user_id)
                ->where('completed', $status)
                ->orderBy('id', 'DESC')->paginate(15);
            return view('todos.index', compact('todos'));       
        }
    }



    public function deleteNote($todo_id, $id) 
    {
        $todo = $this->todos->find($todo_id);

        $note = $this->note->findorfail($id);
        $note->delete();

        // $todo->notes()->detach($id);
        
        return \Response::json(array('success' => 'Your note has been deleted'));

    }

}
