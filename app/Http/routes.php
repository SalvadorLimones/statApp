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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
	$response = new \Illuminate\Http\Response(view('welcome'));
	$response->cookie('uniqid', uniqid(), 3600);
	return $response;
    // return view('welcome');
});

Route::get('/article/{id}', function ($id) {
	$view = view('article', ['id' => $id]);
	return new \Illuminate\Http\Response($view);
});


Route::auth();

Route::get('/stat', 'HomeController@index');
Route::post('/stat', function(Request $request) {
	$r = $request->all();

	if (!isset($r['pages'])) {
		return view('home');
	}

	$this->pages = $r['pages'];

	$result = [
		'browser' => [],
		'os' => [],
		'geo' => [],
		'ref' => []
	];


	$storage = app()->make('redis');
	$keys = $storage->keys( $this->pages . ':*:*:*');


	return view('home', $result);
});
