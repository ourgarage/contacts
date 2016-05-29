@extends('admin.main')

@section('body-title')

    {{ trans('contacts::contacts.admin.title') }}

    <a href="{{ route('contacts::admin::contactCreate') }}" class="btn btn-success pull-right">
        <i class="fa fa-plus"></i> {{ trans('contacts::contacts.admin.create-btn') }}
    </a>

@endsection

@section('body')

    @if(!$contacts->isEmpty())
        @foreach($contacts as $contact)
            <p>{!! $contact->text !!}</p>
        @endforeach
    @else
        <div class="no-results text-center">
            <i class="fa fa-map-signs fa-3x"></i>
            <p>{{ trans('contacts::contacts.admin.no-contacts') }}</p>
        </div>
    @endif

@endsection

