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

        dd(Contact::all());

        if (view()->exists('packages.contacts._admin-contacts')) {
            return view('packages.contacts._admin-contacts');
        } else {
            return view('contacts::_admin-contacts');
        }
    }

    public function adminContactsCreate()
    {
        return 'fbgbbgbg';
    }

}
