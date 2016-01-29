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
Route::post('payment',function(\Illuminate\Http\Request $request){
  // Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

\Log::info('Request:', $request->all());

// Create the charge on Stripe's servers - this will charge the user's card
try {
  $charge = \Stripe\Charge::create(array(
    "amount" => 100, // amount in cents, again
    "currency" => "usd",
    "source" => $request->stripeToken,
    "description" => "Kind Donation"
    ));
} catch(\Stripe\Error\Card $e) {
  // The card has been declined
}
});
Route::get('/',['as' => 'home', function (\Illuminate\Http\Request $request) {
  //dd($request);
  $gateways = App\Gateway::all();
  if ($request->session()->has('user')) {
    //

    $user = $request->session()->get('user')[0];
     //var_dump($user); //exit();
    $todos = App\Todo::where('facebook_id','=', $user['id'])->get();
    //var_dump($todos); exit();
    return view('welcome')->with(['user'=> $user, 'todos' => $todos, 'gateways' => $gateways,'status' => $request->session()->get('status')]);
}
else{
return view('welcome')->with(['gateways' => $gateways,'status' => $request->session()->get('status')]);
}

}]);

Route::get('delete',function(){
  $todos = App\Todo::all();
  foreach($todos as $todo){
    $todo->delete();
  }
  return redirect()->route('home');
});
Route::get('flush',function(\Illuminate\Http\Request $request){
  $request->session()->flush();
  return redirect()->route('home');
});
Route::post('addTodo','TodoController@store');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
