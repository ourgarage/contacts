<?php

Route::group(['middleware' => 'web', 'namespace' => 'Ourgarage\Contacts\Http\Controllers'], function () {

    Route::get('/contacts', 'ContactsController@index')->name('contacts::index');

    Route::get('/admin/contacts', 'ContactsController@adminContactsIndex')->name('contacts::admin::contactsIndex')->middleware('auth');
    Route::get('/admin/contacts/create', 'ContactsController@adminContactsCreate')->name('contacts::admin::contactCreate')->middleware('auth');
    Route::get('/admin/contacts/{id}/update', 'ContactsController@adminContactsUpdate')->name('contacts::admin::contactUpdate')->middleware('auth');
    Route::post('/admin/contacts/createOrUpdate', 'ContactsController@adminContactsCreateOrUpdatePost')->name('contacts::admin::contactsCreateOrUpdate')->middleware('auth');

});
