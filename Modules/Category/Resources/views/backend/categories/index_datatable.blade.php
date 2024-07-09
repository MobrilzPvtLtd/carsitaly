@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ __($module_title) }}
@endsection

@section('breadcrumbs')
    <x-backend.breadcrumbs>
        <x-backend.breadcrumb-item type="active"
            icon='{{ $module_icon }}'>{{ __($module_title) }}</x-backend.breadcrumb-item>
    </x-backend.breadcrumbs>
@endsection

@section('content')
    {{-- <div class="card">
        <div class="card-body">
            <h4>Categories Create</h4>
            <hr>
            <div class="row mt-4">
                <div class="col">
                    {{ html()->form('POST', route("backend.$module_name.store"))->class('form')->acceptsFiles()->open() }}

                    <div class="row mb-3">
                        <div class="col-6 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'name';
                                $field_lable = label_case($field_name);
                                $field_placeholder = $field_lable;
                                $required = 'required';
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'status';
                                $field_lable = label_case($field_name);
                                $field_placeholder = '-- Select an option --';
                                $required = 'required';
                                $select_options = [
                                    '1' => 'Active',
                                    '0' => 'Inactive',
                                    '2' => 'Draft',
                                ];
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
                                {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-select')->attributes(["$required"]) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-backend.buttons.create>Create</x-backend.buttons.create>
                        </div>
                        <div class="col-6">
                            <div class="float-end">
                                <x-backend.buttons.cancel />
                            </div>
                        </div>
                    </div>

                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="card mt-3">
        <div class="card-body">

            <x-backend.section-header>
                <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small
                    class="text-muted">{{ __($module_action) }}</small>

                <x-slot name="toolbar">
                    @can('add_' . $module_name)
                        <x-backend.buttons.create title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}"
                            small="true" route='{{ route("backend.$module_name.create") }}' />
                    @endcan

                    @can('restore_' . $module_name)
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" data-coreui-toggle="dropdown"
                                type="button" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href='{{ route("backend.$module_name.trashed") }}'>
                                        <i class="fas fa-eye-slash"></i> @lang('View trash')
                                    </a>
                                </li>
                                <!-- <li>
                                    <hr class="dropdown-divider">
                                </li> -->
                            </ul>
                        </div>
                    @endcan
                </x-slot>
            </x-backend.section-header>

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table-bordered table-hover table" id="datatable">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        @lang('category::text.name')
                                    </th>
                                    <th>
                                        @lang('category::text.status')
                                    </th>
                                    <th class="text-end">
                                        @lang('category::text.action')
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-7">
                    <div class="float-left">

                    </div>
                </div>
                <div class="col-5">
                    <div class="float-end">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-styles')
    <!-- DataTables Core and Extensions -->
    <link href="{{ asset('vendor/datatable/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('after-scripts')
    <!-- DataTables Core and Extensions -->
    <script type="module" src="{{ asset('vendor/datatable/datatables.min.js') }}"></script>

    <script type="module">
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: true,
            responsive: true,
            ajax: '{{ route("backend.$module_name.index_data") }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    </script>
@endpush
