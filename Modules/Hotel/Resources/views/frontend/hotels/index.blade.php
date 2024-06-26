@extends('frontend.layouts.services-app')

@section('title') {{ __($module_title) }} @endsection

@section('services-content')
        {{-- <div class="row modify-search modify-hotel">
                <div class="container clear-padding">
                    <form action="{{ route('frontend.hotels.index') }}" method="GET">
                        <div class="col-md-4">
                            <div class="form-gp">
                                <label>Location</label>
                                <div class="input-group margin-bottom-sm">
                                    <input type="text" name="city" class="form-control" required placeholder="E.g. Italy">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <div class="form-gp">
                                <label>Check In</label>
                                <div class="input-group margin-bottom-sm">
                                    <input type="text" id="check_in" name="check_in" class="form-control" placeholder="DD/MM/YYYY">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <div class="form-gp">
                                <label>Check Out</label>
                                <div class="input-group margin-bottom-sm">
                                    <input type="text" id="check_out" name="check_out" class="form-control" placeholder="DD/MM/YYYY">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-6 col-xs-3">
                            <div class="form-gp">
                                <label>Rooms</label>
                                <select class="selectpicker" name="room_no">
                                    <option>No</option>
                                    @foreach ($uniqueRoomNumbers as $roomNumbers)
                                        <option>{{ $roomNumbers }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-9">
                            <div class="form-gp">
                                <button type="submit" class="modify-search-button btn transition-effect">MODIFY SEARCH</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
            <div class="container">
                <!-- START: FILTER AREA -->
                <div class="col-md-3 clear-padding">
                    <div class="filter-head text-center">
                        <h4>{{ $hotels->count() }} Result Found Matching Your Search.</h4>
                    </div>
                    <div class="filter-area">
                        <div class="price-filter filter">
                            <h5><i class="fa fa-usd"></i> Price</h5>
                            <p>
                                <label></label>
                                <input type="text" id="amount" name="price" value="120" readonly>
                            </p>
                            <div id="price-range"></div>
                        </div>
                        <div class="name-filter filter">
                            <h5><i class="fa fa-bed"></i> Hotel Name</h5>
                            <div class="input-group margin-bottom-sm">
                                <input type="text" id="search-bar" name="title" class="form-control" required placeholder="E.g. Italy">
                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                            </div>
                        </div>
                        <div class="star-filter filter">
                            <h5><i class="fa fa-star"></i> Star</h5>
                            <ul>
                                <li><input type="checkbox"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                                <li><input type="checkbox"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                                <li><input type="checkbox"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                                <li><input type="checkbox"> <i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                                <li><input type="checkbox"> <i class="fa fa-star"></i></li>
                                <li><input type="checkbox"> <i class="fa fa-star"></i> Any</li>
                            </ul>
                        </div>
                        <div class="location-filter filter">
                            <h5><i class="fa fa-map-marker"></i> Location</h5>
                            <ul>
                                @foreach ($uniqueLocation as $location)
                                    <li><input type="checkbox"> {{ $location }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="facilities-filter filter">
                            <h5><i class="fa fa-list"></i> Hotel Facilities</h5>
                            <ul>
                                <li><input type="checkbox"> <i class="fa fa-wifi"></i> Wifi</li>
                                <li><input type="checkbox"> <i class="fa fa-beer"></i> Bar</li>
                                <li><input type="checkbox"> <i class="fa fa-cutlery"></i> Restaurant</li>
                                <li><input type="checkbox"> <i class="fa fa-coffee"></i> Coffee</li>
                                <li><input type="checkbox"> <i class="fa fa-wifi"></i> Wifi</li>
                                <li><input type="checkbox"> <i class="fa fa-beer"></i> Bar</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END: FILTER AREA -->

                <!-- START: INDIVIDUAL LISTING AREA -->
                <div class="col-md-9 hotel-listing">

                    <!-- START: SORT AREA -->
                    <div class="sort-area col-sm-10">
                        <div class="col-md-3 col-sm-3 col-xs-6 sort">
                            <select class="selectpicker">
                                <option>Price</option>
                                <option> Low to High</option>
                                <option> High to Low</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 sort">
                            <select class="selectpicker">
                                <option>Star Rating</option>
                                <option> Low to High</option>
                                <option> High to Low</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 sort">
                            <select class="selectpicker">
                                <option>User Rating</option>
                                <option> Low to High</option>
                                <option> High to Low</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 sort">
                            <select class="selectpicker">
                                <option>Name</option>
                                <option> Ascending</option>
                                <option> Descending</option>
                            </select>
                        </div>
                    </div>
                    <!-- END: SORT AREA -->
                    <div class="clearfix visible-xs-block"></div>
                    <div class="col-sm-2 view-switcher">
                        <div class="pull-right">
                            <a class="switchgrid" title="Grid View">
                                <i class="fa fa-th-large"></i>
                            </a>
                            <a class="switchlist active" title="List View">
                                <i class="fa fa-list"></i>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="switchable col-md-12 clear-padding">
                        @foreach ($hotels as $hotel)
                            <div  class="hotel-list-view" id="hotel-list">
                                <div class="wrapper">
                                    <div class="col-md-4 col-sm-6 switch-img clear-padding">
                                        @if($hotel->image)
                                            @php
                                                $images = json_decode($hotel->image);
                                            @endphp

                                            @if($images && count($images) > 0)
                                                <img src="{{ asset('public/storage/' . $images[0]) }}" alt="cruise">
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 hotel-info">
                                        <div>
                                            <div class="hotel-header">
                                                <h5>{{ $hotel->title }}
                                                    <span>
                                                        @php
                                                            $rating = $hotel->rating;
                                                            $maxRating = 5;
                                                        @endphp
                                                        @for ($i = 1; $i <= $maxRating; $i++)
                                                            @if ($i <= $rating)
                                                                <i class="fa fa-star colored"></i>
                                                            @else
                                                                <i class="fa fa-star-o colored"></i>
                                                            @endif
                                                        @endfor
                                                    </span>
                                                </h5>
                                                <p>
                                                    <i class="fa fa-map-marker"></i>{{ $hotel->city }}
                                                    <i class="fa fa-phone"></i>(+91) {{ $hotel->mobile }}
                                                </p>
                                            </div>
                                            <div class="hotel-facility">
                                                <p>
                                                    @if($hotel->facilities > 0)
                                                        @foreach (json_decode($hotel->facilities) as $facility)
                                                            @if($facility == "wifi")
                                                                <i class="fa fa-wifi" title="Free Wifi"></i>
                                                            @elseif ($facility == "bed")
                                                                <i class="fa fa-bed" title="Luxury Bedroom"></i>
                                                            @elseif ($facility == "taxi")
                                                                <i class="fa fa-taxi" title="Transportation"></i>
                                                            @elseif ($facility == "beer")
                                                                <i class="fa fa-beer" title="Bar"></i>
                                                            @elseif ($facility == "cutlery")
                                                                <i class="fa fa-cutlery" title="Restaurant"></i>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="hotel-desc">
                                                <p>{{ $hotel->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix visible-sm-block"></div>
                                    <div class="col-md-2 rating-price-box text-center clear-padding">
                                        <div class="rating-box">
                                            <div class="tripadvisor-rating">
                                                <img src="assets/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>
                                            </div>
                                            <div class="user-rating">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                                <span>128 Guest Reviews.</span>
                                            </div>
                                        </div>
                                        <div class="room-book-box">
                                            <div class="price">
                                                <h5>${{ $hotel->price }} Avg/Night</h5>
                                            </div>
                                            <div class="book">
                                                <a href="{{ route('frontend.hotels.show',$hotel->slug) }}">BOOK</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                    <!-- START: PAGINATION -->
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
                    <!-- END: PAGINATION -->
                </div>
                <!-- END: INDIVIDUAL LISTING AREA -->
            </div>
        </div> --}}

    <livewire:filter-index />

@endsection
