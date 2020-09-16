<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function() {
	Route::get('get-counties','MlsController@getCounties');
    Route::get('/home', 'HomeController@index')->name('home');
	Route::get('statelist', function(){
	  return datatables()->of(\DB::table('states')->select('*'))
	      ->make(true);
	})->name('statelist');
	Route::resource('county','CountyController');
	Route::resource('mls','MlsController');

});
