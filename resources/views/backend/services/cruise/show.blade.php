@extends ('backend.layouts.app')

@section('title')
    {{ $$module_name_singular->name }} - {{ $$module_name_singular->username }} - {{ __($module_action) }}
    {{ __($module_title) }}
@endsection

@section('breadcrumbs')
    <x-backend.breadcrumbs>
        <x-backend.breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon='{{ $module_icon }}'>
            {{ $$module_name_singular->name }} - {{ $$module_name_singular->username }}
        </x-backend.breadcrumb-item>

        <x-backend.breadcrumb-item type="active">{{ __($module_title) }}
            {{ __($module_action) }}</x-backend.breadcrumb-item>
    </x-backend.breadcrumbs>
@endsection

@section('content')
    <x-backend.layouts.show :data="$cruise">

        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ $$module_name_singular->name }} -
            {{ $$module_name_singular->username }} <small class="text-muted">{{ __($module_title) }}
                {{ __($module_action) }}</small>

            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
                <a class="btn btn-primary m-1" data-toggle="tooltip" href="{{ route('backend.cruise.index') }}" title="List"><i class="fas fa-list"></i> List</a>
                <x-buttons.edit title="{{ __('Edit') }} {{ ucwords(Str::singular($module_name)) }}"
                    route='{!! route("backend.$module_name.edit", $$module_name_singular) !!}' />
            </x-slot>
        </x-backend.section-header>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table-bordered table-hover table">
                        <tr>
                            <th>{{ __('labels.backend.cruise.fields.image') }}</th>
                            <td>
                                <img class="user-profile-image img-fluid img-thumbnail"
                                    src="{{ asset('public/uploads/cruise/') . '/' . $cruise->image}}"
                                    style="width: 100px;" />
                            </td>
                        </tr>

                        @php
                            $fields_array = [
                                ['name' => 'title', 'type' => 'text'],
                                ['name' => 'location', 'type' => 'text'],
                                ['name' => 'rating', 'type' => 'text'],
                                ['name' => 'price', 'type' => 'text'],
                                ['name' => 'start_date', 'type' => 'date'],
                                ['name' => 'end_date', 'type' => 'date'],
                                ['name' => 'description', 'type' => 'text'],
                            ];
                        @endphp

                        @foreach ($fields_array as $item)
                            @php
                                $field_name = $item['name'];
                            @endphp
                            <tr>
                                <th>{{ __(label_case($field_name)) }}</th>
                                <td>{{ $cruise->$field_name }}</td>
                            </tr>
                        @endforeach
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <?php
                                        $field_name = 'url_website';
                                        $field_lable = label_case($field_name);
                                        $field_placeholder = $field_lable;
                                        $required = '';
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }}
                                    {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
                                </div>
                            </div>
                        </div>

                        <tr>
                            <th>{{ __('labels.backend.cruise.fields.status') }}</th>
                            <td>
                                @if ($cruise->status == 1)
                                    <span class="badge text-bg-success">Active</span>
                                @else
                                    <span class="badge text-bg-warning">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('labels.backend.users.fields.created_at') }}</th>
                            <td>{{ $cruise->created_at }} @yield('name')<small>
                                ({{ $cruise->created_at->diffForHumans() }})</small>
                            </td>
                        </tr>

                        <tr>
                            <th>{{ __('labels.backend.users.fields.updated_at') }}</th>
                            <td>{{ $cruise->updated_at }}<br />
                                <small>({{ $cruise->updated_at->diffForHumans() }})</small>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="py-4 text-end">
                    <a class="btn btn-danger mt-1" data-method="DELETE" data-token="{{ csrf_token() }}"
                        data-toggle="tooltip" data-confirm="Are you sure?"
                        href="{{ route('backend.cruise.destroy', $cruise) }}" title="{{ __('labels.backend.delete') }}"><i class="fas fa-trash-alt"></i> Delete</a>
                </div>
            </div>
        </div>
    </x-backend.layouts.show>
@endsection
