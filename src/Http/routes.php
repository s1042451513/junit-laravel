<?php

Route::get('/', 'JunitController@index');
Route::post('/', 'JunitController@store')->name('sjunit.store');