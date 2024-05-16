@extends('frontend.layouts.services-app')

@section('title')
    {{ app_name() }}
@endsection
@section('services-content')
    <div class="site-wrapper">
        <div class="row page-title modify-holiday">
            <div class="container clear-padding text-center flight-title">
                <h3>OUR TOP TOURS</h3>
                <h4 class="thank">List Of Available Tours</h4>
            </div>
        </div>
        <div class="row">
            <div class="container clear-padding">
                <div class="col-md-12 clear-padding holidays-listing">
                    @foreach ($tours as $tour)
                        <div class="col-md-4 col-sm-6">
                            <div class="holiday-grid-view">
                                <div class="holiday-header-wrapper">
                                    <div class="holiday-header">
                                        <div class="holiday-img">
                                            <img src="{{ asset('public/storage/uploads/tour/') . '/' . $tour->image }}" alt="cruise">
                                        </div>
                                        <div class="detail">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                        </div>
                                        <div class="holiday-price">
                                            <h4>${{ $tour->price }}</h4>
                                            <h5>{{ $tour->duration }} Days</h5>
                                        </div>
                                        <div class="holiday-title">
                                            <h3>{{ $tour->title }}</h3>
                                            <h5>{{ $tour->country }} &#187; {{ $tour->city }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                    <div class="bottom-pagination">
                        <nav class="pull-right">
                            <ul class="pagination pagination-lg">
                                <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">6 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#" aria-label="Previous"><span aria-hidden="true">&#187;</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
