<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'AuditController@policies')
	->name('policies');

Route::get('policy', 'AuditController@policy')
	->name('policy');

Route::get('index', 'AuditController@index')
	->name('index');

Route::get('show', 'AuditController@show')
	->name('show');

Route::post('create', 'AuditController@create')
	->name('create');

Route::put('update', 'AuditController@update')
	->name('update');

Route::delete('delete', 'AuditController@delete')
	->name('delete');

Route::post('restore', 'AuditController@restore')
	->name('restore');

Route::delete('force-delete', 'AuditController@forceDelete')
	->name('force.delete');

Route::post('export', 'AuditController@export')
	->name('export');