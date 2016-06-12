@extends('admin.main')

@section('body-title')

    {{ trans('contacts::contacts.admin.index-page-name') }}

    <a href="{{ route('contacts::admin::contactCreate') }}" class="btn btn-success pull-right">
        <i class="fa fa-plus"></i> {{ trans('contacts::contacts.admin.create-btn') }}
    </a>

@endsection

@section('body')

    <div>
        @if(!$contacts->isEmpty())

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('contacts::contacts.admin.table.title-text') }}</th>
                        <th>{{ trans('contacts::contacts.admin.table.title-update') }}</th>
                        <th>{{ trans('contacts::contacts.admin.table.title-options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <th>{{ $contact->id }}</th>
                            <td>{!! $contact->text !!}</td>
                            <td>{{ df($contact->updated_at) }}</td>
                            <td>
                                <form class="inline"
                                      action="{{ route('contacts::admin::contactDown', ['id' => $contact->id]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-xs btn-info" data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('contacts::contacts.admin.table.tooltip-down') }}"><i class="fa fa-arrow-down"></i>
                                    </button>
                                </form>
                                <form class="inline"
                                      action="{{ route('contacts::admin::contactUp', ['id' => $contact->id]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-xs btn-success" data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('contacts::contacts.admin.table.tooltip-up') }}"><i class="fa fa-arrow-up"></i>
                                    </button>
                                </form>
                                <form class="inline"
                                      action="{{ route('contacts::admin::contactUpdate', ['id' => $contact->id]) }}"
                                      method="GET">
                                    <button type="submit" class="btn btn-xs btn-warning" data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('contacts::contacts.admin.table.tooltip-update') }}"><i class="fa fa-pencil"></i>
                                    </button>
                                </form>
                                <form class="inline"
                                      action="{{ route('contacts::admin::contactDelete', ['id' => $contact->id]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return buttonConfirmation(event, 'Delete?')"
                                            class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                            title="{{ trans('contacts::contacts.admin.table.tooltip-delete') }}"><i class="fa fa-power-off"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $contacts->render() !!}
            </div>
        @else
            <div class="no-results text-center">
                <i class="fa fa-map-signs fa-3x"></i>
                <p>{{ trans('contacts::contacts.admin.no-contacts') }}</p>
            </div>
        @endif
    </div>

@endsection

