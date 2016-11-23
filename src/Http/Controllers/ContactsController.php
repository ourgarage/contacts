<?php

namespace Ourgarage\Contacts\Http\Controllers;

use Ourgarage\Contacts\DTO\ImageResizeDTO;
use App\Http\Controllers\Controller;
use Ourgarage\Contacts\Services\UploadImageSaverService;
use Ourgarage\Contacts\Http\Requests\ContactsFileUploadRequest;
use Ourgarage\Contacts\Models\Contact;
use Notifications;
use File;

class ContactsController extends Controller
{
    public function contactsIndex()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.index-page-title'));

        $contacts = Contact::orderBy('sort')->paginate(10);

        return view('contacts::admin._contacts', ['contacts' => $contacts]);
    }

    public function contactsCreate()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.create-page-title'));

        return view('contacts::admin._contact-create-or-update');
    }

    public function contactsUpdateGet($id, Contact $contact)
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('contacts::contacts.admin.update-page-title'));

        $contact = $contact->where('id', $id)->first();

        return view('contacts::admin._contact-create-or-update', ['contact' => $contact]);
    }

    public function contactsCreateOrUpdatePost($id = null)
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

    public function contactDelete($id)
    {
        Contact::destroy($id);

        Notifications::success(trans('contacts::contacts.admin.notification-delete'), 'top');

        return redirect()->route('contacts::admin::contactsIndex');
    }

    public function contactUp($id)
    {
        $contact = Contact::find($id);

        $neighbor = Contact::where('sort', '<', $contact->sort)
            ->orderBy('sort', 'desc')
            ->first();

        if ($neighbor && !is_null($neighbor->sort)) {
            $contactSort = $contact->sort;

            $contact->sort = $neighbor->sort;
            $neighbor->sort = $contactSort;

            $contact->save();
            $neighbor->save();

            Notifications::success(trans('contacts::contacts.admin.notification-up'), 'top');
        }

        return redirect()->route('contacts::admin::contactsIndex');
    }

    public function contactDown($id)
    {
        $contact = Contact::find($id);

        $neighbor = Contact::where('sort', '>', $contact->sort)
            ->orderBy('sort', 'asc')
            ->first();

        if ($neighbor && !is_null($neighbor->sort)) {
            $contactSort = $contact->sort;

            $contact->sort = $neighbor->sort;
            $neighbor->sort = $contactSort;

            $contact->save();
            $neighbor->save();

            Notifications::success(trans('contacts::contacts.admin.notification-down'), 'top');
        }

        return redirect()->route('contacts::admin::contactsIndex');
    }

    public function contactImageUpload(ContactsFileUploadRequest $request)
    {
        $uploadDir = public_path(config('packages.contacts.imageSavePath'));

        if(!File::exists($uploadDir)){
            File::makeDirectory($uploadDir, 0755, true);
        }

        if($request->ajax()) {
            $file = $request->file('uploadFile');
            $newFilename = str_random() . '.' . $file->getClientOriginalExtension();

            $dto = new ImageResizeDTO();
            $dto->setWidth(1300);
            $dto->setHeight(1300);
            $dto->setPath($uploadDir);
            $dto->setImage($file);
            $dto->setFilename($newFilename);
            $dto->setQuality(75);

            $saver = UploadImageSaverService::saveImage($dto);

            if($saver) {
                $file = asset(config('packages.contacts.imageSavePath') . $newFilename);
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

        return json_encode($data);
    }

}
