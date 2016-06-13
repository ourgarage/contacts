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
            <textarea id="trumbowygEditor" name="text" class="form-control" rows="6"
                      placeholder="{{ trans('contacts::contacts.admin.textarea-placeholder') }}">{{ isset($contact) ? $contact->text : null }}</textarea>
        </div>
        <button class="btn btn-primary pull-right" type="submit">
            {{ isset($contact) ? trans('contacts::contacts.admin.btn-update') : trans('contacts::contacts.admin.btn-create') }}
        </button>
    </form>

@endsection

@section('js')

    <script src="/libs/trumbowyg/dist/trumbowyg.min.js"></script>
    <script>imageUploadUrl = "{!! route('contacts::admin::imageUpload') !!}";</script>

    @if(App::getLocale() != 'en')
        <script>siteLocale = '{!! App::getLocale() !!}';</script>
        <script src="/libs/trumbowyg/dist/langs/{{ App::getLocale() }}.min.js"></script>
    @endif

    <script src="/libs/trumbowyg/dist/plugins/upload/trumbowyg.upload.js"></script>
    <script src="/libs/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js"></script>
    <script src="/js/trumbowyg/_upload-color-plugins.js"></script>

@endsection
