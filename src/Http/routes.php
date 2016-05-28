<?php

Route::group(['middleware' => 'web', 'namespace' => 'Ourgarage\Contacts\Http\Controllers'], function () {

    Route::get('/contacts', 'ContactsController@index')->name('contacts::index');

    Route::get('/admin/contacts', 'ContactsController@index')->name('contacts::admin::index');

});
