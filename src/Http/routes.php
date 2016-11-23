<?php

Route::group(['middleware' => 'web', 'namespace' => 'Ourgarage\Contacts\Http\Controllers'], function () {

    Route::get('/contacts', 'ContactsController@index')->name('contacts::index');

    Route::get('/admin/contacts', 'ContactsController@contactsIndex')->name('contacts::admin::contactsIndex')->middleware('auth');
    Route::get('/admin/contacts/create', 'ContactsController@contactsCreate')->name('contacts::admin::contactCreate')->middleware('auth');
    Route::get('/admin/contacts/{id}/update', 'ContactsController@contactsUpdateGet')->name('contacts::admin::contactUpdate')->middleware('auth');
    Route::post('/admin/contacts/createOrUpdate/{id?}', 'ContactsController@contactsCreateOrUpdatePost')->name('contacts::admin::contactsCreateOrUpdate')->middleware('auth');
    Route::delete('/admin/contacts/{id}/delete', 'ContactsController@contactDelete')->name('contacts::admin::contactDelete')->middleware('auth');
    Route::put('/admin/contacts/{id}/up', 'ContactsController@contactUp')->name('contacts::admin::contactUp')->middleware('auth');
    Route::put('/admin/contacts/{id}/down', 'ContactsController@contactDown')->name('contacts::admin::contactDown')->middleware('auth');
    Route::post('/admin/contacts/upload/image', 'ContactsController@contactImageUpload')->name('contacts::admin::imageUpload')->middleware('auth');

});
