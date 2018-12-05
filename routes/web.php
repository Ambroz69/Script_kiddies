<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'HomeController@showAd')->name('show');
Route::post('/filter','HomeController@filter')->name('filter');
//Route::post('/add_image/{id}','HomeController@storeImage')->name('store_image');
//Route::delete('/delete_image/{image}','HomeController@deleteImage')->name('delete_image');

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

    Route::get('user/ads', 'User\HomeController@showMyAds')->name('ads');
    Route::get('user/ads/show/{ad}', 'User\HomeController@showAd')->name('ads.show');
    Route::post('user/ads/add_image/{id}','User\HomeController@storeImage')->name('ads.store_image');
    Route::delete('user/ads/delete_image/{image}','User\HomeController@deleteImage')->name('ads.delete_image');

    Route::get('user/ads/create', 'User\HomeController@createAd')->name('ads.create');
    Route::post('user/ads/store', 'User\HomeController@storeAd')->name('ads.store');
    Route::get('user/ads/edit/{ad}', 'User\HomeController@editAd')->name('ads.edit');
    Route::patch('user/ads/update/{ad}', 'User\HomeController@updateAd')->name('ads.update');
    Route::delete('user/ads/delete/{ad}','User\HomeController@deleteAd')->name('ads.delete');

});



