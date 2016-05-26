<?php

namespace Ourgarage\Contacts\Http\Controllers;

use App\Http\Controllers\Controller;

class ContactsController extends Controller
{

    public function index()
    {
        if (view()->exists('packages.contacts.test')) {
            return view('packages.contacts.test');
        } else {
            return view('contacts::test');
        }
    }

}
