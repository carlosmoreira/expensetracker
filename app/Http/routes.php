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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('expense', 'ExpensesController');

Route::resource('trackedexpense', 'TrackedExpensesController');

Route::group(['prefix'=>'pages'], function(){
    Route::get('/monthlyexpenses', 'PagesController@monthlyExpenses');
});

Route::get('test', function(){
        return \App\TrackedExpenses::with('expense')->get();
});