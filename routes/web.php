<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('tasks', 'TaskController');
Route::resource('types', 'TypeController');
Route::resource('methods', 'MethodController');
Route::resource('budget', 'BudgetController');
Route::resource('income', 'IncomeController');
Route::resource('activities', 'ActivityController');
Route::resource('information', 'InformationController');

Route::view('/setup', 'setup')->middleware('auth');

Route::get('activity/today', 'ActivityController@today');
Route::get('activity/this-month/{month}/{year}', 'MonthlyActivityController@index');
Route::get('/fetch-data-table', 'DataTableController@index');
Route::get('/fetch-data-table-after-delete', 'DataTableController@fetchAfterDeletedType');

Route::post('/data-for-another-period', 'TypeController@getDataForAnotherPeriod');

Route::resource('compare', 'CompareController');

Route::get('/feed', 'FeedController@index');
Route::post('/feed', 'FeedController@store');
