@extends('admin.main')

@section('body-title')

    {{ trans('contacts::contacts.admin.title') }}

    <a href="{{ route('contacts::admin::contactsCreate') }}" class="btn btn-success pull-right">
        <i class="fa fa-plus"></i> {{ trans('contacts::contacts.admin.create-btn') }}
    </a>

@endsection

@section('body')

    bgbgbbgbg

@endsection

