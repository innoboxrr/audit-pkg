<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'LoginAttemptController@policies')
	->name('policies');

Route::get('policy', 'LoginAttemptController@policy')
	->name('policy');

Route::get('index', 'LoginAttemptController@index')
	->name('index');

Route::get('show', 'LoginAttemptController@show')
	->name('show');

Route::post('create', 'LoginAttemptController@create')
	->name('create');

Route::put('update', 'LoginAttemptController@update')
	->name('update');

Route::delete('delete', 'LoginAttemptController@delete')
	->name('delete');

Route::post('restore', 'LoginAttemptController@restore')
	->name('restore');

Route::delete('force-delete', 'LoginAttemptController@forceDelete')
	->name('force.delete');

Route::post('export', 'LoginAttemptController@export')
	->name('export');