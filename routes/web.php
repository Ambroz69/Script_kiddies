<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'HomeController@showAd')->name('show');
Route::post('/add_image/{id}','HomeController@storeImage')->name('store_image');
Route::post('/filter','HomeController@filter')->name('filter');
Route::delete('/delete_image/{image}','HomeController@deleteImage')->name('delete_image');

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
    Route::resource('admin/images', 'Admin\ImageController');
});
Route::name('user.')->group(function() {
   Route::get('user', 'User\HomeController@index')->name('home');
//   Route::name('office.')->group(function() {
//
//   });
    Route::get('user/office', 'User\HomeController@showOffice')->name('office');
    Route::get('user/office/find', 'User\HomeController@findOffice')->name('office.find');
    Route::get('user/office/create', 'User\HomeController@createOffice')->name('office.create');
    Route::post('user/office/store', 'User\HomeController@storeOffice')->name('office.store');
    Route::get('user/office/edit/{user}', 'User\HomeController@editOffice')->name('office.edit');
    Route::patch('user/office/update/{user}', 'User\HomeController@updateOffice')->name('office.update');
    Route::patch('user/office/{user}', 'User\HomeController@addRequest')->name('office.add_request');
    Route::get('user/office/cancel', 'User\HomeController@cancelRequest')->name('office.cancel_request');
    Route::get('user/office/requests', 'User\HomeController@requests')->name('office.requests');
    Route::get('user/office/requests/accept/{user}', 'User\HomeController@acceptRequest')->name('office.requests.accept');
    Route::get('user/office/requests/reject/{user}', 'User\HomeController@rejectRequest')->name('office.requests.reject');
    Route::get('user/office/employees', 'User\HomeController@employees')->name('office.employees');
    Route::get('user/office/employees/remove/{user}', 'User\HomeController@removeEmployee')->name('office.employees.remove');
});



