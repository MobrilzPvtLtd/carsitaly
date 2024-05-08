@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend.breadcrumbs>
    <x-backend.breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}'>
        {{ __($module_title) }}
    </x-backend.breadcrumb-item>

    <x-backend.breadcrumb-item type="active">{{ __($module_action) }}</x-backend.breadcrumb-item>
</x-backend.breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
            </x-slot>
        </x-backend.section-header>

        <div class="row mt-4">
            <div class="col">

                {{ html()->form('POST', route('backend.car.store'))->class('form-horizontal')->open() }}
                {{ csrf_field() }}

                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.title'))->class('col-sm-2 form-label')->for('title') }}
                    <div class="col-sm-10">
                        {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.car.fields.title'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                    </div>
                </div>

                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.image'))->class('col-sm-2 form-label')->for('image') }}
                    <div class="col-sm-10">
                        <?php
                        $field_name = 'image';
                        $field_lable = label_case($field_name);
                        $field_placeholder = $field_lable;
                        $required = '';
                        ?>
                        {{ html()->input('file', $field_name)->class('form-control')->attributes(["$required"]) }}
                    </div>
                    {{-- @if ($data && $data->getMedia($module_name)->first())
                        <div class="col-4">
                            <div class="float-end">
                                <figure class="figure">
                                    <a href="{{ asset($data->$field_name) }}" data-lightbox="image-set"
                                        data-title="Path: {{ asset($data->$field_name) }}">
                                        <img src="{{ asset($data->getMedia($module_name)->first()->getUrl('thumb300')) }}"
                                            class="figure-img img-fluid rounded img-thumbnail" alt="">
                                    </a>
                                    <!-- <figcaption class="figure-caption">Path: </figcaption> -->
                                </figure>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="image_remove" id="image_remove"
                                        name="image_remove">
                                    <label class="form-check-label" for="image_remove">
                                        Remove this image
                                    </label>
                                </div>
                            </div>
                        </div>
                        <x-library.lightbox />
                    @endif --}}
                </div>

                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.duration'))->class('col-sm-2 form-label')->for('duration') }}

                    <div class="col-sm-10">
                        {{ html()->text('duration')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.car.fields.duration'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                    </div>
                </div>

                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.price'))->class('col-sm-2 form-label')->for('price') }}

                    <div class="col-sm-10">
                        {{ html()->text('price')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.car.fields.price'))
                                ->required() }}
                    </div>
                </div>

                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.vehicle'))->class('col-sm-2 form-label')->for('vehicle') }}

                    <div class="col-sm-10">
                        {{ html()->text('vehicle')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.car.fields.vehicle'))
                                ->required() }}
                    </div>
                </div>

                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.top_speed'))->class('col-sm-2 form-label')->for('top_speed') }}

                    <div class="col-sm-10">
                        {{ html()->text('top_speed')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.car.fields.top_speed'))
                                ->required() }}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.transmission'))->class('col-sm-2 form-label')->for('transmission') }}

                    <div class="col-sm-10">
                        {{ html()->text('transmission')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.car.fields.transmission'))
                                ->required() }}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.mileage'))->class('col-sm-2 form-label')->for('mileage') }}

                    <div class="col-sm-10">
                        {{ html()->text('mileage')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.car.fields.mileage'))
                                ->required() }}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.fuel'))->class('col-sm-2 form-label')->for('fuel') }}

                    <div class="col-sm-10">
                        {{ html()->text('fuel')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.car.fields.fuel'))
                                ->required() }}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.capacity'))->class('col-sm-2 form-label')->for('capacity') }}

                    <div class="col-sm-10">
                        {{ html()->text('capacity')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.car.fields.capacity'))
                                ->required() }}
                    </div>
                </div>

                <div class="form-group row mb-3">
                    {{ html()->label(__('labels.backend.car.fields.status'))->class('col-6 col-sm-2 form-label')->for('status') }}

                    <div class="col-6 col-sm-10">
                        {{ html()->checkbox('status', true, '1') }} @lang('Active')
                    </div>
                </div>
                <!--form-group-->

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <x-buttons.create title="{{__('Create')}} {{ ucwords(Str::singular($module_name)) }}">
                                {{__('Create')}}
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
                {{ html()->form()->close() }}

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
