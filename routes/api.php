<?php

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
/*
 |--------------------------------------------------------------------------
 | API Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register API routes for your application. These
 | routes are loaded by the RouteServiceProvider within a group which
 | is assigned the "api" middleware group. Enjoy building your API!
 |
 */

/*
 Route::get('/user', function (Request $request) {
 return $request->user();
 })->middleware('auth:api');

 Route::middleware('auth:api') -> get('/user', function(Request $request) {
 return $request -> user();
 });
 */
Route::post('/save-subscription', function(Request $request) {

	$sub = json_encode(array('subscriptions' => $request -> all(), 'lg' => Config::get('app.sequence_store'), 'codloja' => Config::get('app.sequence_codloja')));
	try {
		$client = new GuzzleHttp\Client();

		$res = $client -> request('POST', Config::get('app.sequence_endpoint') . 'set-subscribe-to-web-push-notification', ['form_params' => ['dt' => $sub]]);

	} catch (GuzzleHttp\Exception\ClientException $e) {

		dd($e -> getResponse() -> getBody() -> getContents());

	}

	return $res -> getBody();

}) -> name("api-push");
