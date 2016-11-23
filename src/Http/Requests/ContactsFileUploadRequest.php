<?php

namespace Ourgarage\Contacts\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Notifications;
use App\Http\Requests\Request;

class ContactsFileUploadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        $rules = [
            'uploadFile' => 'required|mimes:jpg,jpeg,png,gif,bmp'
        ];

        return $rules;
    }

    public function response(Array $errors)
    {
        return Response::json($errors);
    }

    public function formatErrors(Validator $validator)
    {
        return $validator->errors()->all()->toJson();
    }
}
