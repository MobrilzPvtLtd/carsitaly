@extends('frontend.layouts.services-app')

@section('title') {{$$module_name_singular->title}} - {{ __($module_title) }} @endsection

@section('services-content')

<div class="row page-title">
    <div class="container clear-padding text-center">
        <h3>{{ $villa->title }}</h3>
        {{-- <h5>
            @for ($i = 1; $i < 5; $i++)
                @if($i <= $villa->rating)
                    <i class="fa fa-star"></i>
                @else
                    <i class="fa fa-star-o"></i>
                @endif
            @endfor
        </h5>
        <p><i class="fa fa-map-marker"></i> {{ $villa->city }}, {{ $villa->mobile }}</p> --}}
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
                    @if($villa->images)
                        @php
                            $images = json_decode($villa->images);
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
                <ul class="nav nav-tabs tabs001">
                    <li class="active"><a data-toggle="tab" href="#Villa_Information
                    "><i class="fa fa-bolt"></i> <span>Villa Information
                    </span></a></li>
                    <li><a data-toggle="tab" href="#Location_Details"><i class="fa fa-info-circle"></i> <span>Location Details</span></a></li>
                    <li><a data-toggle="tab" href="#Property_Details"><i class="fa fa-bed"></i> <span>Property Details</span></a></li>
                    <li><a data-toggle="tab" href="#Amenities
                    "><i class="fa fa-bed"></i> <span>Amenities
                    </span></a></li>
                    {{-- <li><a data-toggle="tab" href="#Pricing_and_Availability
                    "><i class="fa fa-bed"></i> <span>Pricing and Availability
                    </span></a></li> --}}
                    {{-- <li><a data-toggle="tab" href="#Reviews_and_Ratings
                    "><i class="fa fa-bed"></i> <span>Reviews and Ratings
                    </span></a></li> --}}
                    <li><a data-toggle="tab" href="#Media
                    "><i class="fa fa-bed"></i> <span>Media
                    </span></a></li>
                    {{-- <li><a data-toggle="tab" href="#review"><i class="fa fa-comments"></i> <span>Reviews</span></a></li> --}}
                    {{-- <li><a data-toggle="tab" href="#write-review"><i class="fa fa-edit"></i> <span>Write Review</span></a></li> --}}
                </ul>
                <div class="tab-content">
                    <div id="Villa_Information" class="tab-pane active in fade">
                        <h4 class="tab-heading">Villa Name: {{ $villa->title }}</h4>
                        <p> <b>Description:</b> {{ $villa->description }}</p>
                        <p> <b>Category:</b> {{ $villa->category }}</p>
                    </div>
                    <div id="Location_Details" class="tab-pane fade">
                        <h4 class="tab-heading">Address: {{ $villa->address }}</h4>
                        <p>  <b>City:</b> {{ $villa->city }}</p>
                        <p>  <b>State/Province:</b> {{ $villa->state }}</p>
                        <p>  <b>Country:</b> {{ $villa->country }}</p>
                        <p>  <b> GPS Coordinates:</b>  {{ $villa->latitude }} - {{ $villa->longitude }}
                        </p>
                        <p>  <b>Neighborhood Description:</b> {{ $villa->description_details }}
                        </p>
                    </div>

                    <div id="Property_Details" class="tab-pane fade">
                        <h4 class="tab-heading">Number of Bedrooms: {{ $villa->number_of_bedrooms }}</h4>
                        <p> <b> Number of Bathrooms:</b> {{ $villa->number_of_bathrooms }}</p>
                        <p> <b>Maximum Occupancy:</b> {{ $villa->maximum_occupancy }}
                        </p>
                        <p> <b> Square Footage:</b> {{ $villa->square_footage }}</p>
                        <p> <b>Floor Plan:</b> <img src="{{ asset('public/storage/'. $villa->floor_plan) }}" width="100px"></p>

                    </div>
                    <div id="Amenities" class="tab-pane fade">
                        {{-- <h4 class="tab-heading"> Kitchen: {{ $villa->kitchen }}</h4> --}}
                        {{-- <p> <b> Living Room:</b> {{ $villa->living_room }}</p> --}}
                        {{-- <p> <b>Internet:</b> {{ $villa->internet }}</p> --}}
                        {{-- <p> <b>Air Conditioning:</b> {{ $villa->air_conditioning }}</p> --}}
                        {{-- <p> <b>Heating:</b> {{ $villa->heating }}</p> --}}
                        {{-- <p> <b> Swimming Pool:</b> {{ $villa->swimming_pool }}</p> --}}
                        {{-- <p> <b>Parking:</b> {{ $villa->parking }}</p> --}}
                        {{-- <p> <b> Outdoor Space:</b> {{ $villa->outdoor_space }}</p> --}}
                        <p> <b>Amenities:</b>
                            @if ($villa->amenities > 0)
                                @foreach (json_decode($villa->amenities) as $amenities)
                                    {{ ucfirst(strtolower($amenities)) }},
                                @endforeach
                            @endif
                        </p>
                    </div>
                    {{-- <div id="Pricing_and_Availability" class="tab-pane fade">
                        <h4 class="tab-heading"> Base Price: {{ $villa->price }}</h4>
                    </div> --}}
                    <div id="Media" class="tab-pane fade">
                        <h4 class="tab-heading">Villa Images:</h4>
                        @if ($villa->images)
                            @php
                                $images = json_decode($villa->images);
                            @endphp
                            @if ($images && count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <img src="{{ asset('public/storage/' . $image) }}" alt="Villa" width="100px">
                                @endforeach
                            @endif
                        @endif
                        <h4> Video Villas:</h4>
                        @if ($villa->videos)
                            <iframe width="540" height="280" src="https://www.youtube.com/embed/{{ $villa->videos }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        @endif
                    </div>
                    {{-- <div id="room-info" class="tab-pane">
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
                    </div> --}}
                    <div id="ammenties" class="tab-pane fade">
                        <h4 class="tab-heading">Ammenties Style 1</h4>
                        <div class="ammenties-1">
                            {{-- @foreach (json_decode($villa->facilities) as $faci)
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
                            @endforeach --}}
                        </div>
                        <div class="ammenties-3">
                            <h4 class="tab-heading">Ammenties Style 2</h4>
                            {{-- @foreach (json_decode($latest->facilities) as $facili)
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
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="similar-hotel sidebar-item">
                <h4><i class="fa fa-bed"></i> Similar Villas</h4>
                <div class="sidebar-item-body">
                    @foreach ($latest_villa as $similar)
                        <div class="similar-hotel-box">
                            <a href="{{ route('frontend.villas.show',$similar->slug) }}">
                                <div class="col-md-5 col-sm-5 col-xs-5 clear-padding">
                                    @php
                                        $images = json_decode($similar->images);
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
        <div class="col-md-4 hotel-detail-sidebar">
            <div class="col-md-12 sidebar-wrapper clear-padding">
                <div class="map sidebar-item">
                    <h5><i class="fa fa-map-marker"></i> {{ $villa->address }}, {{ $villa->city }}, {{ $villa->country }}, {{ $villa->pin_code }}</h5>
                    {{-- <iframe class="hotel-map" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJG1usnet4BTkRzQqb_Ys-JOg&amp;key=AIzaSyB6hgZM-ruUqTPVUjXGUR-vv7WRqc4MXjY"></iframe> --}}
                    <div id="map-canvas" style="height: 300px; width: 100%;"></div>
                </div>
                <div class="contact sidebar-item">
                    <div class="sidebar-booking-box">
						<h3 class="text-center">MAKE A BOOKING</h3>
						<div class="booking-box-body">
							<form action="{{ route('booking') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $villa->id }}" name="service_id">
                                <input type="hidden" value="villas" name="booking_type">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>Check-in Date</label>
									<div class="input-group margin-bottom-sm">
										<input type="text" id="check_in" name="pickup_date" class="form-control" placeholder="DD/MM/YYYY" required>
										<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
									</div>
								</div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
									<label>Check-out Date</label>
									<div class="input-group margin-bottom-sm">
										<input type="text" id="check_out" name="drop_date" class="form-control" placeholder="DD/MM/YYYY" required>
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
								{{-- <div class="room-price">
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
								</div> --}}
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

            </div>
        </div>
    </div>
</div>

@endsection
@push('after-scripts')
    <script>

        function initMap() {
            var latitude = parseFloat("{{ $villa->latitude }}");
            var longitude = parseFloat("{{ $villa->longitude }}");

            const myLatLng = { lat: latitude, lng: longitude };
            const map = new google.maps.Map(document.getElementById("map-canvas"), {
                zoom: 8,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello World!",
            });
        }

        window.initMap = initMap;
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&callback=initMap" async defer></script>
@endpush
