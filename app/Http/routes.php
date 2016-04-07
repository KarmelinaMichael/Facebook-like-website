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
//if(session_destroy()){


//}
//if(session('on')==1){

//session_start();
	//Route::post('login', 'UserController@login');

// 	Route::group(array('before' => 'login'), function()
// {
Route::filter('loginn',function(){
	if(session('user_id')==null){

		return Redirect::to('/');}
		
});
Route::filter('logou',function(){
	if(session('user_id')!=null){
return Redirect::to('home');
		}
		
});








Route::group(array('before' => 'loginn'), function()
 {
Route::get('home','HomeController@index');

Route::get('profile/{id}', 'ProfileController@show');

Route::get('friend_requests', 'HomeController@friend_requests');

Route::get('add_friend/{id}', 'ProfileController@add_friend');

Route::get('like/{id}', 'PostController@like');

Route::get('unlike/{id}', 'PostController@unlike');

Route::get('likers/{id}', 'PostController@likers');

Route::get('confirm_friend_request/{id}', 'ProfileController@confirm_friend_request');

Route::get('delete_friend_request/{id}', 'ProfileController@delete_friend_request');

Route::get('my_friends','ProfileController@my_friends');
// Route::get('signup', function()
// {
// 	return View::make('user.signup')
// 		->with ('title', 'Signup');
 
// });

 


// Route::get('logout', array('as'=>'logout', 'uses'=>'UserController@logout'));
Route::get('logout', function()
{
	Auth::logout();
	Session::flush();
	return Redirect::to('/');
});



Route::post('upload','UploadController@upload');
Route::get('delete','UploadController@delete');
Route::get('edit', function()
{
	return View::make('edit')
		->with ('title', 'Edit information');
 
});

Route::post('edit','UserController@edit');

Route::get('upload', function()
{ $k=session('user_id');
	/*echo "<a href=\"\profile/$k\"><h3>Profile</h3></a>";
   echo "<br><br>";*/
  /*  echo  "<a href=\"\home\"><h3>Home</h3></a>";
    echo "<br>";
    echo "<a href=\"\logout\"><h3>logout<h3></a>";*/



	return View::make('image');
});

Route::post('/uploadp','PostController@store');
Route::post('/deletep/{id}','PostController@destroy');
Route::delete('postd/{id}','PostController@destroy');
Route::get('like/{id}', 'PostController@like');

Route::get('unlike/{id}', 'PostController@unlike');

Route::get('likers/{id}', 'PostController@likers');
	
});		




 	



	

	
  Route::post('signup', 'UserController@signup');

// Route to the login page

Route::get('login', function()
{
	return Redirect::to('/')->with ('title', 'error');
});
 
// Route to the login page for post
Route::post('login', 'UserController@login');
	

//Route to the signup page for post
Route::group(array('before' => 'logou'), function(){
Route::get('/', function () {
    return view('welcome');
});

});
// Route::group(array('after' => 'login'), function()
// {


Route::get('search', 'userController@search');
//Route::resource('post', 'PostController');
