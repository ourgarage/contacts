@extends('admin.main')

@section('css')

    <link href="/packages/trumbowyg/dist/ui/trumbowyg.min.css" rel="stylesheet" type='text/css'>
    <link href="/packages/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css" rel="stylesheet" type='text/css'>

@endsection

@section('body-title')

    {{ trans('contacts::contacts.admin.title') }}

@endsection

@section('body')

    <form action="{{ route('contacts::admin::contactsCreateOrUpdate') }}" method="POST">
        {!! csrf_field() !!}
        <textarea id="trumbowygContactCreate" name="text"
                  placeholder="{{ trans('contacts::contacts.admin.textarea-placeholder') }}">{{ $contact or null }}</textarea>
        <button class="btn btn-primary" type="submit">AAAA</button>
    </form>

@endsection

@section('js')

    <script src="/packages/trumbowyg/dist/trumbowyg.min.js" type="text/javascript"></script>
    <script src="/packages/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js" type="text/javascript"></script>
    <script src="/packages/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js" type="text/javascript"></script>

    @if(\App::getLocale() == 'en')
        <script src="/packages/trumbowyg/dist/langs/ru.min.js" type="text/javascript"></script>
    @endif

    <script>appLocale = '{{ \App::getLocale() }}';</script>

    <script>
        $('#trumbowygContactCreate').trumbowyg({
            lang: appLocale,
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['formatting'],
                'btnGrp-semantic',
                ['superscript', 'subscript'],
                ['link'],
                ['image'],
                'btnGrp-justify',
                'btnGrp-lists',
                ['foreColor', 'backColor'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ]
        });
    </script>

@endsection