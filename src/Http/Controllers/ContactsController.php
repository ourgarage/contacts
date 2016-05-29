<?php

namespace Ourgarage\Contacts\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\Contacts\Models\Contact;

class ContactsController extends Controller
{

    public function adminContactsIndex()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.title-append'));

        $contacts = Contact::all()->sortBy('sort');

        if (view()->exists('packages.contacts._admin-contacts')) {
            return view('packages.contacts._admin-contacts', ['contacts' => $contacts]);
        } else {
            return view('contacts::_admin-contacts', ['contacts' => $contacts]);
        }
    }

    public function adminContactsCreate()
    {
        if (view()->exists('packages.contacts._admin-contacts')) {
            return view('packages.contacts._admin-contact-create');
        } else {
            return view('contacts::_admin-contact-create');
        }
    }

}
