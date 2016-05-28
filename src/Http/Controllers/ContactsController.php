<?php

namespace Ourgarage\Contacts\Http\Controllers;

use App\Http\Controllers\Controller;

class ContactsController extends Controller
{

    public function index()
    {
        if (view()->exists('packages.contacts._admin-contacts')) {
            return view('packages.contacts._admin-contacts');
        } else {
            return view('contacts::_admin-contacts');
        }
    }

}
