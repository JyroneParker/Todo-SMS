<?php

namespace App\Http\Controllers;
use App\Todo;
use App\Events\TodoCreatedEvent;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all todos
        $todos = Todo::all();
        return $todos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create Todo Model and
          $todo = new Todo;
          $todo->content = $request->content;
          $todo->save();
          //launch event
          event(new TodoCreatedEvent($todo));
          return $todo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return model instance
        $todo = Todo:find($id);
        return $todo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get model instance
        $todo = Todo::find($id);
        $todo->content = $request->content;
        $todo->save();
        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get model instance and delete
        Todo::find($id)->delete();

    }
}
