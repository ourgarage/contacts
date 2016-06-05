@extends('admin.main')

@section('css')

    {{--<link href="/packages/summernote/dist/summernote.css" rel="stylesheet" type='text/css'>--}}

@endsection

@section('body-title')

    {{ trans('contacts::contacts.admin.title') }}

@endsection

@section('body')
    <a href="{{ route('contacts::admin::contactUpdate', 1) }}">fvbfdbgbgbb</a>
    {{ isset($contact) ? 'AAAA' : 'BBBB' }}
    <form action="{{ route('contacts::admin::contactsCreateOrUpdate') }}" method="POST">
        {!! csrf_field() !!}
        <textarea id="ckeditorContactCreate" name="text"
                  placeholder="{{ trans('contacts::contacts.admin.textarea-placeholder') }}">{{ $contact or null }}</textarea>
        <button class="btn btn-primary" type="submit">AAAA</button>
    </form>

@endsection

@section('js')

    <script src="/packages/ckeditor/ckeditor.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            CKEDITOR.replace('ckeditorContactCreate', {
                filebrowserBrowseUrl : '/browser/browse.php',
                filebrowserUploadUrl : '/uploader/upload.php'
            });
        });
    </script>
    {{--@if(\App::getLocale() == 'ru')--}}
        {{--<script src="/packages/summernote/dist/lang/summernote-ru-RU.js" type="text/javascript"></script>--}}
        {{--<script>var appLocale = 'ru-RU';</script>--}}
    {{--@elseif(\App::getLocale() == 'en')--}}
        {{--<script>var appLocale = 'en-EN';</script>--}}
    {{--@endif--}}

@endsection
