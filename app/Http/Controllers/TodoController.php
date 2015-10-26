<?php

namespace App\Http\Controllers;
use App\Todo;
use App\Events\TodoCreatedEvent;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\SendText;

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
          if ($request->session()->has('user')) {
            $user = $request->session()->get('user');
            //var_dump($user); exit();
            $todo->facebook_id = $user[0]['id'];
            //var_dump($todo->facebook_id);exit();
          }
          $todo->content = $request->content;
          $todo->save();
          //var_dump($todo);exit();
          //launch event

          $phone = $request->phone . $request->gateway;
          //dd($phone);
          $timer = $request->timer;
          event(new TodoCreatedEvent($todo,$phone,$timer));
          //(new SendText($todo->content,$phone))->delay(30);
          return redirect('/');
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
        $todo = Todo::find($id);
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
