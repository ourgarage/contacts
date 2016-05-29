<?php

Route::group(['middleware' => 'web', 'namespace' => 'Ourgarage\Contacts\Http\Controllers'], function () {

    Route::get('/contacts', 'ContactsController@index')->name('contacts::index');

    Route::get('/admin/contacts', 'ContactsController@adminContactsIndex')->name('contacts::admin::contactsIndex')->middleware('auth');
    Route::get('/admin/contacts/create', 'ContactsController@adminContactsCreate')->name('contacts::admin::contactsCreate')->middleware('auth');

});
