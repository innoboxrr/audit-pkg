<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ActionController@policies')
	->name('policies');

Route::get('policy', 'ActionController@policy')
	->name('policy');

Route::get('index', 'ActionController@index')
	->name('index');

Route::get('show', 'ActionController@show')
	->name('show');

Route::post('create', 'ActionController@create')
	->name('create');

Route::put('update', 'ActionController@update')
	->name('update');

Route::delete('delete', 'ActionController@delete')
	->name('delete');

Route::post('restore', 'ActionController@restore')
	->name('restore');

Route::delete('force-delete', 'ActionController@forceDelete')
	->name('force.delete');

Route::post('export', 'ActionController@export')
	->name('export');