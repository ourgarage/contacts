<?php

namespace Ourgarage\Contacts\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\Contacts\Models\Contact;

class ContactsController extends Controller
{

    public function adminContactsIndex()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.index-page-title'));

        $contacts = Contact::all()->sortBy('sort');

        if (view()->exists('packages.contacts._admin-contacts')) {
            return view('packages.contacts._admin-contacts', ['contacts' => $contacts]);
        } else {
            return view('contacts::_admin-contacts', ['contacts' => $contacts]);
        }
    }

    public function adminContactsCreate()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.create-page-title'));

        if (view()->exists('packages.contacts._admin-contacts')) {
            return view('packages.contacts._admin-contact-create');
        } else {
            return view('contacts::_admin-contact-create-or-update');
        }
    }

    public function adminContactsUpdateGet($id, Contact $contact)
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.update-page-title'));

        $contact = $contact->where('id', $id)->first();

        if (view()->exists('packages.contacts._admin-contacts')) {
            return view('packages.contacts._admin-contact-create', ['contact' => $contact]);
        } else {
            return view('contacts::_admin-contact-create-or-update', ['contact' => $contact]);
        }
    }

    public function adminContactsCreateOrUpdatePost()
    {
        dd(request('text'));
    }

}
