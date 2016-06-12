<?php

namespace Ourgarage\Contacts\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\Contacts\Models\Contact;
use Notifications;
use File;

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
            $max = Contact::max('sort');

            Contact::create([
                'text' => request('text'),
                'sort' => $max + 1
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
        Contact::destroy($id);

        Notifications::success(trans('contacts::contacts.admin.notification-delete'), 'top');

        return redirect()->route('contacts::admin::contactsIndex');
    }

    public function adminContactUp($id)
    {
        $contact = Contact::find($id);

        $neighbor = Contact::where('sort', '<', $contact->sort)
            ->orderBy('sort', 'desc')
            ->first();

        if (!is_null($neighbor->sort)) {
            $contactSort = $contact->sort;

            $contact->sort = $neighbor->sort;
            $neighbor->sort = $contactSort;

            $contact->save();
            $neighbor->save();
        }

        Notifications::success(trans('contacts::contacts.admin.notification-up'), 'top');

        return redirect()->route('contacts::admin::contactsIndex');
    }

    public function adminContactDown($id)
    {
        $contact = Contact::find($id);

        $neighbor = Contact::where('sort', '>', $contact->sort)
            ->orderBy('sort', 'asc')
            ->first();

        if (!is_null($neighbor->sort)) {
            $contactSort = $contact->sort;

            $contact->sort = $neighbor->sort;
            $neighbor->sort = $contactSort;

            $contact->save();
            $neighbor->save();
        }

        Notifications::success(trans('contacts::contacts.admin.notification-down'), 'top');

        return redirect()->route('contacts::admin::contactsIndex');
    }

    public function adminContactImageUpload()
    {
        if(File::exists(public_path('packages/contacts/images/'))){
            return 'OK';
        } else {
            File::makeDirectory(public_path('packages/contacts/images'), 0755, true);
            return 'NO';
        }
        define("UPLOADDIR", public_path('packages/contacts/images/'));
// Detect if it is an AJAX request
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $file = array_shift($_FILES);
            if(move_uploaded_file($file['tmp_name'], UPLOADDIR . basename($file['name']))) {
                $file = '/images/admin/upload_images/' . $file['name'];
                $data = array(
                    'success' => true,
                    'file'    => $file,
                );
            } else {
                $error = true;
                $data = array(
                    'message' => 'uploadError',
                );
            }
        } else {
            $data = array(
                'message' => 'uploadNotAjax',
                'formData' => $_POST
            );
        }
        echo json_encode($data);
    }

}
