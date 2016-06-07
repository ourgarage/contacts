<?php

namespace Ourgarage\Contacts\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\Contacts\Models\Contact;
use Notifications;

class ContactsController extends Controller
{
    public function adminContactsIndex()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.index-page-title'));

        $contacts = Contact::orderBy('sort')->paginate(10);

        return view('contacts::admin._admin-contacts', ['contacts' => $contacts]);
    }

    public function adminContactsCreate()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.create-page-title'));

        return view('contacts::admin._admin-contact-create-or-update');
    }

    public function adminContactsUpdateGet($id, Contact $contact)
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.update-page-title'));

        $contact = $contact->where('id', $id)->first();

        return view('contacts::admin._admin-contact-create-or-update', ['contact' => $contact]);
    }

    public function adminContactsCreateOrUpdatePost($id = null)
    {
        if (is_null($id)) {
            Contact::create([
                'text' => request('text')
            ]);

            Notifications::success(trans('contacts::contacts.admin.notification-create'), 'top');
        } else {
            Contact::where('id', $id)->update([
                'text' => request('text')
            ]);

            Notifications::success(trans('contacts::contacts.admin.notification-update'), 'top');
        }

        return redirect()->route('contacts::admin::contactsIndex');
    }

    public function adminContactDelete($id)
    {

    }

    public function adminContactUp($id)
    {

    }

    public function adminContactDown($id)
    {

    }

}
