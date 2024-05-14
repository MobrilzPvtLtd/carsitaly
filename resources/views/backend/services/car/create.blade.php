@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ __($module_title) }}
@endsection

@section('breadcrumbs')
    <x-backend.breadcrumbs>
        <x-backend.breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon='{{ $module_icon }}'>
            {{ __($module_title) }}
        </x-backend.breadcrumb-item>

        <x-backend.breadcrumb-item type="active">{{ __($module_action) }}</x-backend.breadcrumb-item>
    </x-backend.breadcrumbs>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <x-backend.section-header>
                <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small
                    class="text-muted">{{ __($module_action) }}</small>

                <x-slot name="subtitle">
                    @lang(':module_name Management Dashboard', ['module_name' => Str::title($module_name)])
                </x-slot>
                <x-slot name="toolbar">
                    <x-backend.buttons.return-back />
                </x-slot>
            </x-backend.section-header>

            <div class="row mt-4">
                <div class="col">
                    <form method="POST" action="{{ route('backend.car.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group mb-2 col-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Title..." value="{{ old('title') }}">
                            </div>

                            <div class="form-group mb-2 col-4">
                                <label for="duration">Duration</label>
                                <input type="number" class="form-control" id="duration" name="duration"
                                    placeholder="Duration..." value="{{ old('duration') }}">
                            </div>

                            <div class="form-group mb-2 col-4">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="" value="{{ old('price') }}">
                            </div>
                            <div class="form-group mb-2 col-4">
                                <label for="vehicle">Vehicle</label>
                                <input type="text" class="form-control" id="vehicle" name="vehicle" placeholder="" value="{{ old('vehicle') }}">
                            </div>

                            <div class="form-group mb-2 col-4">
                                <label for="top_speed">Top Speed</label>
                                <input type="number" class="form-control" id="top_speed" name="top_speed" placeholder="" value="{{ old('top_speed') }}">
                            </div>
                            <div class="form-group mb-2 col-4">
                                <label for="city">Images</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group mb-2 col-4">
                                <label for="transmission">Transmission</label>
                                <input type="text" class="form-control" name="transmission" placeholder="" value="{{ old('transmission') }}">
                            </div>
                            <div class="form-group mb-2 col-4">
                                <label for="mileage">Mileage</label>
                                <input type="number" class="form-control" name="mileage" placeholder="" value="{{ old('mileage') }}">
                            </div>
                            <div class="form-group mb-2 col-4">
                                <label for="fuel">Fuel</label>
                                <input type="text" class="form-control" name="fuel" placeholder="" value="{{ old('fuel') }}">
                            </div>
                            <div class="form-group mb-2 col-4">
                                <label for="capacity">Capacity</label>
                                <input type="number" class="form-control" name="capacity" placeholder="" value="{{ old('capacity') }}">
                            </div>
                            <div class="form-group mb-2 col-4">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <x-buttons.create
                                        title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}">
                                        {{ __('Create') }}
                                    </x-buttons.create>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="float-end">
                                    <div class="form-group">
                                        <x-buttons.cancel />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row mb-3">
                <div class="col">
                    <small class="float-end text-muted">

                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
