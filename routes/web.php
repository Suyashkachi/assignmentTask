<?php

Route::namespace('Auth')->group(function() {
	Route::get('/', 'RegisterController@index')->name('index');
	Route::post('register', 'RegisterController@register')->name('register');
});