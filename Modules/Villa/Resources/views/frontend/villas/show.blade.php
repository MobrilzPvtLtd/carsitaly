@extends('frontend.layouts.services-app')

@section('title') {{$$module_name_singular->title}} - {{ __($module_title) }} @endsection

@section('services-content')

<div class="row page-title">
    <div class="container clear-padding text-center">
        <h3>{{ $villa->title }}</h3>
        <h5>
            @for ($i = 1; $i < 5; $i++)
                @if($i <= $villa->rating)
                    <i class="fa fa-star"></i>
                @else
                    <i class="fa fa-star-o"></i>
                @endif
            @endfor
        </h5>
        <p><i class="fa fa-map-marker"></i> {{ $villa->city }}, {{ $villa->mobile }}</p>
    </div>
</div>
<div class="row hotel-detail">
    <div class="container">
        <div class="main-content col-md-8">
            <div id="room-gallery" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#room-gallery" data-slide-to="0" class="active"></li>
                    <li data-target="#room-gallery" data-slide-to="1"></li>
                    <li data-target="#room-gallery" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    @if($villa->image)
                        @php
                            $images = json_decode($villa->image);
                        @endphp
                        @if ($images && count($images) > 0)
                            @foreach ($images as $index => $image)
                                <div class="item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('public/storage/' . $image) }}" alt="Hotel">
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>

                <a class="left carousel-control" href="#room-gallery" role="button" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#room-gallery" role="button" data-slide="next">
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="room-complete-detail">
                <ul class="nav nav-tabs">
                    <li><a data-toggle="tab" href="#overview"><i class="fa fa-bolt"></i> <span>Overview</span></a></li>
                    <li class="active"><a data-toggle="tab" href="#room-info"><i class="fa fa-info-circle"></i> <span>Rooms</span></a></li>
                    <li><a data-toggle="tab" href="#ammenties"><i class="fa fa-bed"></i> <span>Ammenties</span></a></li>
                    {{-- <li><a data-toggle="tab" href="#review"><i class="fa fa-comments"></i> <span>Reviews</span></a></li> --}}
                    {{-- <li><a data-toggle="tab" href="#write-review"><i class="fa fa-edit"></i> <span>Write Review</span></a></li> --}}
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane fade">
                        <h4 class="tab-heading">About Grand Lilly</h4>
                        <p>{{ $villa->description }}</p>
                    </div>
                    <div id="room-info" class="tab-pane fade in active">
                        <h4 class="tab-heading">Room Types</h4>
                        @foreach ($latest_villa as $latest)
                            <div class="room-info-wrapper">
                                <div class="col-md-4 col-sm-6 clear-padding">
                                    @php
                                        $images = json_decode($latest->image);
                                    @endphp
                                    @if ($images && count($images) > 0)
                                        <img src="{{ asset('public/storage/' . $images[0]) }}" alt="cruise">
                                    @endif
                                </div>
                                <div class="col-md-5 col-sm-6 room-desc">
                                    <h4>{{ $latest->title }}</h4>
                                    <h5>Max Guest: {{ $latest->adults }} Adults</h5>
                                    <p>Includes 2 meals -
                                        @if($latest->meals > 0)
                                            @foreach (json_decode($latest->meals) as $meals)
                                                {{ ucfirst(strtolower($meals)) }},
                                            @endforeach
                                        @endif
                                    </p>
                                    <p>
                                        @if($latest->facilities > 0)
                                            @foreach (json_decode($latest->facilities) as $facility)
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
                                <div class="clearfix visible-sm-block"></div>
                                <div class="col-md-3 text-center booking-box">
                                    <div class="price">
                                        <h3>${{ $latest->price }}/Night</h3>
                                    </div>
                                    <div class="book">
                                        <a href="#">BOOK</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="ammenties" class="tab-pane fade">
                        <h4 class="tab-heading">Ammenties Style 1</h4>
                        <div class="ammenties-1">
                            @foreach (json_decode($villa->facilities) as $faci)
                                <div class="col-md-4 col-sm-6">
                                    @if($faci == "wifi")
                                        <p><i class="fa fa-glass"></i> Free Drinks</p>
                                    @elseif ($faci == "taxi")
                                        <p><i class="fa fa-taxi"></i>Taxi Available</p>
                                    @elseif ($faci == "bed")
                                        <p><i class="fa fa-bed"></i>Luxury Bedroom</p>
                                    @elseif ($faci == "beer")
                                        <p><i class="fa fa-beer"></i>Bar Available</p>
                                    @elseif ($faci == "cutlery")
                                        <p><i class="fa fa-cutlery"></i>Free Meal</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="ammenties-3">
                            <h4 class="tab-heading">Ammenties Style 2</h4>
                            @foreach (json_decode($latest->facilities) as $facili)
                                <div class="col-md-4 col-sm-6">
                                    @if($facili == "wifi")
                                        <p><i class="fa fa-wifi"></i> Free Wifi</p>
                                    @elseif ($facili == "taxi")
                                        <p><i class="fa fa-taxi"></i>Taxi Available</p>
                                    @elseif ($facili == "bed")
                                        <p><i class="fa fa-bed"></i>Luxury Bedroom</p>
                                    @elseif ($facili == "beer")
                                        <p><i class="fa fa-beer"></i>Bar Available</p>
                                    @elseif ($facili == "cutlery")
                                        <p><i class="fa fa-cutlery"></i>Free Meal</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 hotel-detail-sidebar">
            <div class="col-md-12 sidebar-wrapper clear-padding">
                <div class="map sidebar-item">
                    <h5><i class="fa fa-map-marker"></i> Mall Road, Shimla, Himachal Pradesh, 176077</h5>
                    <iframe class="hotel-map" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJG1usnet4BTkRzQqb_Ys-JOg&amp;key=AIzaSyB6hgZM-ruUqTPVUjXGUR-vv7WRqc4MXjY"></iframe>
                </div>
                <div class="contact sidebar-item">
                    <div class="sidebar-booking-box">
						<h3 class="text-center">MAKE A BOOKING</h3>
						<div class="booking-box-body">
							<form action="{{ route('booking') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $villa->id }}" name="service_id">
                                <input type="hidden" value="villa" name="booking_type">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>Start</label>
									<div class="input-group margin-bottom-sm">
										<input type="text" id="check_in" name="start_date" class="form-control" placeholder="DD/MM/YYYY" required>
										<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
									</div>
								</div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
									<label>End</label>
									<div class="input-group margin-bottom-sm">
										<input type="text" id="check_out" name="end_date" class="form-control" placeholder="DD/MM/YYYY" required>
										<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
									</div>
								</div>
								{{-- <div class="col-md-12 col-sm-12 col-xs-12">
									<label>Duration</label>
									<select class="selectpicker" name="rooms">
										<option>3 Days</option>
										<option>5 Days</option>
										<option>1 Week</option>
										<option>10 Days</option>
										<option>2 Week</option>
										<option>15+ Days</option>
									</select>
								</div> --}}
								<div class="col-md-6 col-sm-6 col-xs-6">
									<label>Adult</label>
									<select class="selectpicker" name="adult">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<label>Child</label>
									<select class="selectpicker" name="child">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
									</select>
								</div>
								<div class="room-price">
									<div class="col-md-8 col-sm-8 col-xs-8">
										<label><input type="checkbox" name="room_type" value="single" id="single" onchange="toggleCheckbox(this)"><span>Deluxe Single Room</span></label>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4">
										<h5>$99/Night</h5>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="room-price">
									<div class="col-md-8 col-sm-8 col-xs-8">
										<label><input type="checkbox" name="room_type" value="double" id="double" onchange="toggleCheckbox(this)"><span>Deluxe Double Room</span></label>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4">
										<h5>$199/Night</h5>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="room-price">
									<div class="col-md-8 col-sm-8 col-xs-8">
										<label><input type="checkbox" name="room_type" value="royal"  id="royal" onchange="toggleCheckbox(this)"><span>Royal Suite</span></label>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4">
										<h5>$299/Night</h5>
									</div>
								</div>
                                @if(!Auth::check())
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label>Name</label>
                                        <input type="text" id="check_in" name="name" class="form-control" placeholder="Enter Your Name">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label>Email</label>
                                        <input type="text" id="check_in" name="email" class="form-control" placeholder="Enter Your Email">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label>Mobile</label>
                                        <input type="text" id="check_in" name="mobile" class="form-control" placeholder="Enter Your Mobile">
                                    </div>
                                @endif
								<div class="clearfix"></div>
								<div class="grand-total text-center">
									<div class="col-md-6 col-sm-6 col-xs-6">
										<h4>Total $599</h4>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6">
										<button type="submit">BOOK</button>
									</div>
								</div>
							</form>
						</div>
					</div>
                </div>
                <div class="contact sidebar-item">
                    <h4><i class="fa fa-phone"></i> Contact Hotel</h4>
                    <div class="sidebar-item-body">
                        <h5><i class="fa fa-phone"></i> +91 {{ $villa->mobile }}</h5>
                        <h5><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $villa->email }}">Send Email</a></h5>
                        <h5><i class="fa fa-map-marker"></i> {{ $villa->address }}, {{ $villa->city }}, {{ $villa->country }}, {{ $villa->pin_code }}</h5>
                    </div>
                </div>
                <div class="similar-hotel sidebar-item">
                    <h4><i class="fa fa-bed"></i> Similar Hotel</h4>
                    <div class="sidebar-item-body">
                        @foreach ($similar_villa as $similar)
                            <div class="similar-hotel-box">
                                <a href="{{ route('frontend.villas.show',$similar->slug) }}">
                                    <div class="col-md-5 col-sm-5 col-xs-5 clear-padding">
                                        @php
                                            $images = json_decode($similar->image);
                                        @endphp
                                        @if ($images && count($images) > 0)
                                            <img src="{{ asset('public/storage/' . $images[0]) }}" alt="cruise">
                                        @endif
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                        <h5>{{ $similar->title }}<span><i class="fa fa-star"></i></span></h5>
                                        <h5><i class="fa fa-map-marker"></i> {{ $similar->address }}, {{ $similar->city }}</h5>
                                        <span>${{ $similar->price }}/Night</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
