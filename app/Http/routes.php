<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|//
*/

Route::get('/',['as' => 'home', function (\Illuminate\Http\Request $request) {
  if ($request->session()->has('user')) {
    //
    $user = $request->session()->get('user')[0];
     //var_dump($user); //exit();
    $todos = App\Todo::where('facebook_id','=', $user['id'])->get();
    //var_dump($todos); exit();
    return view('welcome')->with(['user'=> $user, 'todos' => $todos]);
}
else{
return view('welcome');
}

}]);


Route::get('flush',function(\Illuminate\Http\Request $request){
  $request->session()->flush();
  return redirect()->route('home');
});
Route::post('addTodo','TodoController@store');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
