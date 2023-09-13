@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.roles.management'))

@section('breadcrumb-links')
    @include('backend.auth.roles.includes.breadcrumb-links')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-visible">
                <div class="panel-heading br-b-n">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span> @lang('labels.backend.access.roles.management')
                    </div>
                </div>
                <div class="panel-body pn">

                    <table class="table" id="roles-table" data-ajax_url="{{ route('admin.auth.role.get') }}">
                        <thead>
                            <tr>
                                <th>@lang('labels.backend.access.roles.table.role')</th>
                                <th>@lang('labels.backend.access.roles.table.permissions')</th>
                                <th>@lang('labels.backend.access.roles.table.number_of_users')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script>
        FTX.Utils.documentReady(function() {
            FTX.Roles.list.init();
        });
    </script>
@endsection
