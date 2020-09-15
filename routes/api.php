<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/sections', 'SectionController@index');
Route::get('/section/{section}', 'SectionController@show');
Route::post('/section', 'SectionController@store');
Route::patch('/section/{section}', 'SectionController@update');
Route::delete('/section/{section}', 'SectionController@destroy');

