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

/* We can all so use it
Route::get('foo', function(){
	return 'Bar';
});
*/

Route::get('about', 'PagesController@about');
//auth on page in route
//Route::get('about', ['middleware' => 'auth','uses' => 'PagesController@about']);
//Route::get('about', ['middleware' => 'auth',function(){
    //return 'this page will only show if the user is signed in';
//}]);
Route::get('contact', 'PagesController@contact');

//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');
//Route::get('articles/{id}', 'ArticlesController@show');
//Route::post('articles', 'ArticlesController@store');
//Route:get('articles/{id}/edit', 'ArticlesController@edit');

Route::resource('articles', 'ArticlesController');

Route::controllers([
    'auth'	=> 'Auth\AuthController',
    'password'	=> 'Auth\PasswordController',
]);

Route::get('foo', ['middleware' => 'manager', function(){
    return 'This page may only view by managers';
}]);


