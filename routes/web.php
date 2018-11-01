<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::name('admin.')->group(function () {
    Route::get('admin', 'Admin\HomeController@index')->name('home');
    Route::resource('admin/users', 'Admin\UserController');
    Route::resource('admin/realestateoffices', 'Admin\RealEstateOfficeController');
});



