<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'HomeController@showAd')->name('show');


Route::name('admin.')->group(function () {
    Route::get('admin', 'Admin\HomeController@index')->name('home');
    Route::resource('admin/users', 'Admin\UserController');
    Route::resource('admin/realestateoffices', 'Admin\RealEstateOfficeController');
    Route::resource('admin/addresses', 'Admin\AddressController');

    Route::resource('admin/houses', 'Admin\HouseController');
    Route::resource('admin/apartments', 'Admin\ApartmentController');
    Route::resource('admin/estates', 'Admin\EstateController');
    Route::resource('admin/propertydetails', 'Admin\PropertyDetailController');
    Route::resource('admin/ads','Admin\AdController');
});



