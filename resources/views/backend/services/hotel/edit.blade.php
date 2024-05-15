@extends('backend.layouts.app')

@section('title')
    {{$$module_name_singular->name}} - {{ $$module_name_singular->username }} - {{ __($module_action) }} {{ __($module_title) }}
@endsection

@section('breadcrumbs')
    <x-backend.breadcrumbs>
        <x-backend.breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon='{{ $module_icon }}'>
            {{$$module_name_singular->name}} - {{ $$module_name_singular->username }}
        </x-backend.breadcrumb-item>

        <x-backend.breadcrumb-item type="active">{{ __($module_title) }} {{ __($module_action) }}</x-backend.breadcrumb-item>
    </x-backend.breadcrumbs>
@endsection

@section('content')
    <x-backend.layouts.edit :data="$hotel">
        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{$$module_name_singular->name}} - {{ $$module_name_singular->username }} <small
                class="text-muted">{{ __($module_title) }} {{ __($module_action) }}</small>

            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
                <x-buttons.show class="ms-1" title="{{ __('Show') }} {{ ucwords(Str::singular($module_name)) }}"
                    route='{!! route("backend.$module_name.show", $$module_name_singular) !!}' />
            </x-slot>
        </x-backend.section-header>

        <div class="row mt-4">
            <div class="col">
                <form method="POST" action="{{ route('backend.hotel.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $hotel->id }}">
                <div class="row">
                    <div class="form-group mb-2 col-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Title..." value="{{ $hotel->title }}">
                    </div>

                    <div class="form-group mb-2 col-4">
                        <label for="traveller">Traveller</label>
                        <input type="text" class="form-control" name="traveller" placeholder="" value="{{ $hotel->traveller }}">
                    </div>

                    <div class="form-group mb-2 col-4">
                        <label for="base_ammount">Base Ammount</label>
                        <input type="number" class="form-control" id="base_ammount" name="base_ammount" placeholder="" value="{{ $hotel->base_ammount }}">
                    </div>

                    <div class="form-group mb-2 col-4">
                        <label for="service_tax">Service Tax</label>
                        <input type="number" class="form-control" id="service_tax" name="service_tax" placeholder="" value="{{ $hotel->service_tax }}">
                    </div>

                    <div class="form-group mb-2 col-4">
                        <label for="other_taxes">Other Taxs</label>
                        <input type="number" class="form-control" id="other_taxes" name="other_taxes" placeholder="" value="{{ $hotel->other_taxes }}">
                    </div>

                    <div class="form-group mb-2 col-4">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="" value="{{ $hotel->price }}">
                    </div>

                    <div class="form-group mb-2 col-6">
                        <label for="city">Images</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="form-group mb-2 col-6">
                        <label for="theme">Theme</label>
                        <input type="text" class="form-control" id="theme" name="theme"
                            placeholder="theme..." value="{{ $hotel->theme }}">
                    </div>
                    <div class="form-group mb-2 col-4">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $hotel->start_date }}" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group mb-2 col-4">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $hotel->end_date }}" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="form-group mb-2 col-4">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" {{ $hotel->status == 1 ? 'selected' : null }}>Active</option>
                            <option value="0" {{ $hotel->status == 0 ? 'selected' : null }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <div class="form-group">
                            <x-backend.buttons.save />
                        </div>
                    </div>

                    <div class="col-8 mb-3">
                        <div class="float-end">
                            @if ($$module_name_singular->id != 1)
                                <a class="btn btn-danger" data-method="DELETE" data-token="{{ csrf_token() }}"
                                    data-toggle="tooltip"
                                    href="{{ route("backend.$module_name.destroy", $$module_name_singular) }}"
                                    title="{{ __('labels.backend.delete') }}"><i class="fas fa-trash-alt"></i> Delete</a>
                            @endif
                            <x-backend.buttons.return-back>@lang('Cancel')</x-backend.buttons.return-back>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <!--/.col-->
        </div>
    </x-backend.layouts.edit>
@endsection
