<?php

Route::group(['middleware' => 'web', 'namespace' => 'Ourgarage\Contacts\Http\Controllers'], function () {

    Route::get('contacts', 'Admin\ContactsController@index')->name('contacts::index');

    Route::get('admin/contacts', 'Admin\ContactsController@contactsIndex')->name('contacts::admin::contactsIndex')->middleware('auth');
    Route::get('admin/contacts/create', 'Admin\ContactsController@contactsCreate')->name('contacts::admin::contactCreate')->middleware('auth');
    Route::get('admin/contacts/{id}/update', 'Admin\ContactsController@contactsUpdateGet')->name('contacts::admin::contactUpdate')->middleware('auth');
    Route::post('admin/contacts/createOrUpdate/{id?}', 'Admin\ContactsController@contactsCreateOrUpdatePost')->name('contacts::admin::contactsCreateOrUpdate')->middleware('auth');
    Route::delete('admin/contacts/{id}/delete', 'Admin\ContactsController@contactDelete')->name('contacts::admin::contactDelete')->middleware('auth');
    Route::put('admin/contacts/{id}/up', 'Admin\ContactsController@contactUp')->name('contacts::admin::contactUp')->middleware('auth');
    Route::put('admin/contacts/{id}/down', 'Admin\ContactsController@contactDown')->name('contacts::admin::contactDown')->middleware('auth');
    Route::post('admin/contacts/upload/image', 'Admin\ContactsController@contactImageUpload')->name('contacts::admin::imageUpload')->middleware('auth');

});
