<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as' => 'home', function (\Illuminate\Http\Request $request) {
  if ($request->session()->has('user')) {
    //
    $user = $request->session()->get('user');
    //var_dump($user); exit();
    return view('welcome')->with(['user'=> $user]);
}
else{
return view('welcome');
}

}]);

Route::post('addTodo','TodoController@store');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
