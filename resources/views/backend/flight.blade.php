@extends('backend.layouts.app')

@section('title') @lang("Dashboard") @endsection

@section('breadcrumbs')
<x-backend.breadcrumbs />
@endsection

@section('content')
<div class="card mb-4 ">
    <div class="card-body">

        <x-backend.section-header>
            @lang("Flight Enquiry")
        </x-backend.section-header>

        <livewire:flight-index />
    </div>
</div>

@endsection
