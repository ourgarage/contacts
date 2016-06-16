@extends('admin.main')

@section('css')

    <link href="/libs/trumbowyg/dist/ui/trumbowyg.min.css" rel="stylesheet" type='text/css'>
    <link href="/libs/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css" rel="stylesheet" type='text/css'>

@endsection

@section('body-title')

    {{ isset($contact) ? trans('contacts::contacts.admin.update-page-title') : trans('contacts::contacts.admin.create-page-title') }}

@endsection

@section('body')

    <form action="{{ route('contacts::admin::contactsCreateOrUpdate', isset($contact) ? $contact->id : null) }}"
          method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <textarea id="contactCreate" name="text" class="form-control" rows="6"
                      placeholder="{{ trans('contacts::contacts.admin.textarea-placeholder') }}">{{ isset($contact) ? $contact->text : null }}</textarea>
        </div>
        <button class="btn btn-primary pull-right" type="submit">
            {{ isset($contact) ? trans('contacts::contacts.admin.btn-update') : trans('contacts::contacts.admin.btn-create') }}
        </button>
    </form>

@endsection

@section('js')

    @inject('connect', 'App\Http\ViewConnectors\EditorConnector')

    {!! $connect->connect('#contactCreate', App::getLocale(), route('contacts::admin::imageUpload'), 'full') !!}

@endsection
