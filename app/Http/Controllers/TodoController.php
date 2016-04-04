<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Auth\Access as Gate;
use App\Todo;
use App\User;
use App\Http\Flash as Flash;
use App\Http\Requests;

class TodoController extends Controller
{

    public function __construct(Todo $todos, User $user) 
    {
        $this->middleware('auth');
        $this->todos = $todos;
        $this->user = $user;
        $this->user_id = \Auth::user()->id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all() 
    {
        return $this->todoStatus('all');
    }

    public function index()
    {   
        return $this->todoStatus('current', false);
    }

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        // $this->authorize('destroy', Todo::class);
        $todo = $this->todos->find($id);

        if(\Gate::denies('destroy', $todo)) {
            flash('error', 'Error','Sorry, something went wrong, please try again.');
            return redirect()->back();
        }

        if($todo) {
            $todo->delete();
            flash('success', 'Deleted', 'Todo has been deleted successfully');
            return redirect()->back();
        } else {
            flash('error', 'Error','Sorry, something went wrong, please try again.');
            return redirect()->back();
        }
        
    }

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

}
