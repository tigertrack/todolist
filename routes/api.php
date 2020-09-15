<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/sections', 'SectionController@index');
Route::get('/section/{section}', 'SectionController@show');
Route::post('/section', 'SectionController@store');
Route::patch('/section/{section}', 'SectionController@update');
Route::delete('/section/{section}', 'SectionController@destroy');

Route::get('/tasks', 'TaskController@index');
Route::get('/task/{task}', 'TaskController@show');
Route::post('/task', 'TaskController@store');
Route::patch('/task/{task}', 'TaskController@update');
Route::delete('/task/{task}', 'TaskController@destroy');

