<?php

Route::group(['middleware' => 'web', 'namespace' => 'Ourgarage\Contacts\Http\Controllers'], function () {

    Route::get('/contacts', 'Admin\ContactsController@index')->name('contacts::index');

    Route::get('/Admin\contacts', 'Admin\ContactsController@contactsIndex')->name('contacts::admin::contactsIndex')->middleware('auth');
    Route::get('/Admin\contacts/create', 'Admin\ContactsController@contactsCreate')->name('contacts::admin::contactCreate')->middleware('auth');
    Route::get('/Admin\contacts/{id}/update', 'Admin\ContactsController@contactsUpdateGet')->name('contacts::admin::contactUpdate')->middleware('auth');
    Route::post('/Admin\contacts/createOrUpdate/{id?}', 'Admin\ContactsController@contactsCreateOrUpdatePost')->name('contacts::admin::contactsCreateOrUpdate')->middleware('auth');
    Route::delete('/Admin\contacts/{id}/delete', 'Admin\ContactsController@contactDelete')->name('contacts::admin::contactDelete')->middleware('auth');
    Route::put('/Admin\contacts/{id}/up', 'Admin\ContactsController@contactUp')->name('contacts::admin::contactUp')->middleware('auth');
    Route::put('/Admin\contacts/{id}/down', 'Admin\ContactsController@contactDown')->name('contacts::admin::contactDown')->middleware('auth');
    Route::post('/Admin\contacts/upload/image', 'Admin\ContactsController@contactImageUpload')->name('contacts::admin::imageUpload')->middleware('auth');

});
