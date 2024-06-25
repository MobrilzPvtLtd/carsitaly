@extends('backend.layouts.app')

@section('title') @lang("Dashboard") @endsection

@section('breadcrumbs')
<x-backend.breadcrumbs />
@endsection
@section('style')
    <style>
        .card {
            border: none;
            margin-bottom: 24px;
            -webkit-box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
            box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
        }

        .avatar-xs {
            height: 2.3rem;
            width: 2.3rem;
        }
    </style>
@endsection

@section('content')
<div class="card mb-4 ">
    <div class="card-body">
        <x-backend.section-header>
            @lang("Admin Dashboard")

            <x-slot name="toolbar">
                <button class="btn btn-outline-primary mb-1" type="button" data-toggle="tooltip" data-coreui-placement="top" title="Tooltip">
                    <i class="fa-solid fa-bullhorn"></i>
                </button>
            </x-slot>
        </x-backend.section-header>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-info">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-plane ml-3" style="font-size: 20px"></i>
                        </div>
                        <h3 class="font-size-20 mt-0 pt-1 text-info">{{ $flight }}</h3>
                        <a href="{{ route('backend.flight-enquiry') }}">
                            <p class="text-muted mb-0">Total Flights Enquiry</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-danger">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-bed ml-3" style="font-size: 20px"></i>
                        </div>
                        <h3 class="font-size-20 mt-0 pt-1 text-danger">{{ $hotels }}</h3>
                        <a href="{{ route('backend.hotels.index') }}">
                            <p class="text-muted mb-0">Total Hotels</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-success">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-suitcase ml-3" style="font-size: 20px"></i>
                        </div>
                        <h3 class="font-size-20 mt-0 pt-1 text-success">{{ $tours }}</h3>
                        <a href="{{ route('backend.tours.index') }}">
                            <p class="text-muted mb-0">Total Tours</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-warning">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-cab ml-3" style="font-size: 20px"></i>
                        </div>
                        <h3 class="font-size-20 mt-0 pt-1 text-warning">{{ $cars }}</h3>
                        <a href="{{ route('backend.transfer.index') }}">
                            <p class="text-muted mb-0">Total Cars</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-info">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-ship ml-3" style="font-size: 20px"></i>
                        </div>
                        <h3 class="font-size-20 mt-0 pt-1 text-info">{{ $cruises }}</h3>
                        <a href="{{ route('backend.cruises.index') }}">
                            <p class="text-muted mb-0">Total Cruise</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-danger">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-home ml-3" style="font-size: 20px"></i>
                        </div>
                        <h3 class="font-size-20 mt-0 pt-1 text-danger">{{ $villas }}</h3>
                        <a href="{{ route('backend.villas.index') }}">
                            <p class="text-muted mb-0">Total Villas</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-danger">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-users ml-3" style="font-size: 20px"></i>
                        </div>
                        <h3 class="font-size-20 mt-0 pt-1 text-danger">{{ $users }}</h3>
                        <a href="{{ route('backend.users.index') }}">
                            <p class="text-muted mb-0">Total Users</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-success">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fab fa-first-order ml-3" style="font-size: 20px"></i>
                        </div>
                        <h3 class="font-size-20 mt-0 pt-1 text-success">{{ $booking }}</h3>
                        <a href="{{ route('backend.bookings') }}">
                            <p class="text-muted mb-0">Total Bookings</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-warning">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-phone ml-3" style="font-size: 20px"></i>
                        </div>
                        <h3 class="font-size-20 mt-0 pt-1 text-warning">{{ $contact }}</h3>
                        <a href="{{ route('backend.contact-message') }}">
                            <p class="text-muted mb-0">Total Contact Enquiry</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
