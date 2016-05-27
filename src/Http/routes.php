<?php

Route::group(['namespace' => 'Ourgarage\Contacts\Http\Controllers'], function () {

    Route::get('/contacts', 'ContactsController@index');

});
