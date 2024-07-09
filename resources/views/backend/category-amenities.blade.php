@extends('backend.layouts.app')

@section('title') Category & Amenities @endsection

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-xl-3 col-md-6">
            <div class="card radius-10 p-2">
                <div class="card-body">
                    <a href="{{ route('backend.categories.index') }}">
                        <h5 class="text-muted text-center">Category</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card radius-10 p-2">
                <div class="card-body">
                    <a href="{{ route('backend.categories.index') }}">
                        <h5 class="text-muted text-center">Amenities/Features</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
