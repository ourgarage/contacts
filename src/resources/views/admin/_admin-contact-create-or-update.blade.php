@extends('admin.main')

@section('css')

    {{--CKEDITOR--}}

@endsection

@section('body-title')

    {{ isset($contact) ? trans('contacts::contacts.admin.update-page-title') : trans('contacts::contacts.admin.create-page-title') }}

@endsection

@section('body')

    <form action="{{ route('contacts::admin::contactsCreateOrUpdate', isset($contact) ? $contact->id : null) }}"
          method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
        <textarea name="text" class="form-control" rows="6"
                  placeholder="{{ trans('contacts::contacts.admin.textarea-placeholder') }}">{{ isset($contact) ? $contact->text : null }}</textarea>
        </div>
        <button class="btn btn-primary pull-right" type="submit">
            {{ isset($contact) ? trans('contacts::contacts.admin.btn-update') : trans('contacts::contacts.admin.btn-create') }}
        </button>
    </form>

@endsection

@section('js')

    {{--CKEDITOR--}}

@endsection
