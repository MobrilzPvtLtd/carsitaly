@extends('frontend.layouts.services-app')

@section('title') {{$$module_name_singular->title}} - {{ __($module_title) }} @endsection

@section('services-content')

<div class="row page-title">
    <div class="container clear-padding text-center">
        <h3>{{ $hotel->title }}</h3>
        <h5>
            @for ($i = 1; $i < 5; $i++)
                @if($i <= $hotel->rating)
                    <i class="fa fa-star"></i>
                @else
                    <i class="fa fa-star-o"></i>
                @endif
            @endfor
        </h5>
        <p><i class="fa fa-map-marker"></i> {{ $hotel->city }}, {{ $hotel->pin_code }}</p>
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
                    @if($hotel->images)
                        @php
                            $images = json_decode($hotel->images);
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
                    <li><a data-toggle="tab" href="#Hotel_Information
"><i class="fa fa-bolt"></i> <span>Hotel Information
</span></a></li>
                    <li><a data-toggle="tab" href="#Location_Details
"><i class="fa fa-bolt"></i> <span>Location Details
</span></a></li>
                    <li><a data-toggle="tab" href="#Contact_Information
"><i class="fa fa-bolt"></i> <span>Contact Information
</span></a></li>
                    <li class="active"><a data-toggle="tab" href="#Amenities_and_Services
"><i class="fa fa-info-circle"></i> <span>Amenities and Services
</span></a></li>
                    <li><a data-toggle="tab" href="#Pricing_and_Availability
"><i class="fa fa-bed"></i> <span>Pricing and Availability
</span></a></li>
                    <li><a data-toggle="tab" href="#Media"><i class="fa fa-bed"></i> <span>Media</span></a></li>
                    <li><a data-toggle="tab" href="#Reviews_and_Ratings

"><i class="fa fa-bed"></i> <span>Reviews and Ratings

</span></a></li>
                    {{-- <li><a data-toggle="tab" href="#review"><i class="fa fa-comments"></i> <span>Reviews</span></a></li> --}}
                    {{-- <li><a data-toggle="tab" href="#write-review"><i class="fa fa-edit"></i> <span>Write Review</span></a></li> --}}
                </ul>
                <div class="tab-content">
                    <div id="Hotel_Information" class="tab-pane fade">
                        <h4 class="tab-heading"> Hotel Name</h4>
                        <p>Description</p>
                        <p><b>Category:</b> It's a budget hotel </p>
                    </div>
                    <div id="Location_Details" class="tab-pane fade">
                        <h4 class="tab-heading"> Address: Full address of the hotel.</h4>
                        <p> <b>City:</b>City where the hotel is located.</p>
                        <p> <b>State/Province:</b> State or province.</p>
                        <p> <b>Country:</b>country name</p>
                        <p>  <b>Zip Code/Postal Code:</b> Postal code of the hotel’s location</p>
                        <p>   <b>Latitude:</b> Latitude coordinate for map integration.</p>
                        <p>  <b>Longitude:</b> Longitude coordinate for map integration</p>
                    </div>
                    <div id="Contact_Information" class="tab-pane fade">
                        <h4 class="tab-heading">Phone Number: Contact number of the hotel.
                        </h4>
                        <p> <b> Email Address:</b> Contact email.</p>
                        <p> <b>State/Province:</b> State or province.</p>
                        <p> <b>Website (optional):</b> Hotel’s official website URL.</p>
                        <p>  <b> Social Media Links:</b> Links to social media profiles.</p>
                    </div>
                    <div id="Amenities_and_Services" class="tab-pane fade">
                        <h4 class="tab-heading">Amenities: List of amenities offered (e.g., Wi-Fi, pool, gym, spa).
                        </h4>
                        <p> <b>  Room Types:</b>  Various room types available (e.g., single, double, suite).</p>
                        <p> <b> Facilities:</b> List of facilities (e.g., conference rooms, parking, restaurant).
                        </p>
                    </div>
                    <div id="Pricing_and_Availability" class="tab-pane fade">
                        <h4 class="tab-heading">Base Price: Starting price for rooms.
                        </h4>
                    </div>
                    <div id="Media" class="tab-pane fade">
                        <h4 class="tab-heading">Images:
                        </h4>
                        <img src="{{ asset('img/avatars/default-avatar.jpg') }}">
                        <h4>Videos:</h4>
                    </div>
                    <div id="room-info" class="tab-pane fade in active">
                        <h4 class="tab-heading">Room Types</h4>
                        @foreach ($latest_hotel as $latest)
                            <div class="room-info-wrapper">
                                <div class="col-md-4 col-sm-6 clear-padding">
                                    @php
                                        $images = json_decode($latest->images);
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
                                        <a href="{{ route('frontend.hotels.show',$latest->slug) }}">BOOK</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="ammenties" class="tab-pane fade">
                        <h4 class="tab-heading">Ammenties Style 1</h4>
                        <div class="ammenties-1">
                            @foreach (json_decode($hotel->facilities) as $faci)
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
                            {{-- <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-cutlery"></i>Free Meal</p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-taxi"></i>Taxi Available</p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-beer"></i>Bar Available</p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-desktop"></i>LED</p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-coffee"></i>Free Coffee</p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-wheelchair"></i>Wheelchair</p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-paw"></i>Pet Room</p>
                            </div> --}}
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
                            {{-- <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-wifi"></i> Free Wifi</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-glass"></i> Free Drinks</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-cutlery"></i> Free Meal</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-taxi"></i> Taxi Available</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-desktop"></i> LED</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-beer"></i> Bar Available</p>
                            </div> --}}
                        </div>
                        {{-- <div class="ammenties-4">
                            <h4 class="tab-heading">Ammenties Style 3</h4>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-wifi"></i> Free Wifi</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-glass"></i> Free Drinks</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-cutlery"></i> Free Meal</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-taxi"></i> Taxi Available</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-desktop"></i> LED</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-beer"></i> Bar Available</p>
                            </div>
                        </div>
                        <div class="ammenties-5">
                            <h4 class="tab-heading">Ammenties Style 4</h4>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-check-square-o"></i> Free Wifi</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-check-square-o"></i> Free Drinks</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-check-square-o"></i> Free Meal</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-check-square-o"></i> Taxi Available</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-check-square-o"></i> LED</p>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <p><i class="fa fa-check-square-o"></i> Bar Available</p>
                            </div>
                        </div>
                        <div class="ammenties-2">
                            <h4 class="tab-heading">Ammenties Style 5</h4>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="ammenties-2-wrapper text-center">
                                    <span>Free Wifi</span>
                                    <i class="fa fa-wifi"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="ammenties-2-wrapper text-center">
                                    <span>Free Meal</span>
                                    <i class="fa fa-cutlery"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="ammenties-2-wrapper text-center">
                                    <span>Free Drinks</span>
                                    <i class="fa fa-glass"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="ammenties-2-wrapper text-center">
                                    <span>Free Coffee</span>
                                    <i class="fa fa-coffee"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="ammenties-2-wrapper text-center">
                                    <span>Free Wifi</span>
                                    <i class="fa fa-wifi"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="ammenties-2-wrapper text-center">
                                    <span>Free Meal</span>
                                    <i class="fa fa-cutlery"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="ammenties-2-wrapper text-center">
                                    <span>Free Drinks</span>
                                    <i class="fa fa-glass"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="ammenties-2-wrapper text-center">
                                    <span>Free Coffee</span>
                                    <i class="fa fa-coffee"></i>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div id="review" class="tab-pane fade">
                        <div class="review-header">
                            <div class="col-md-6 col-sm6 text-center">
                                <h2>4.0/5.0</h2>
                                <h5>Based on 128 Reviews</h5>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <table class="table">
                                    <tr>
                                        <td>Value for Money</td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Atmosphere in hotel</td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Quality of food</td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Staff behaviour</td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Restaurant Quality</td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                            <div class="guest-review">
                                <div class="individual-review dark-review">
                                    <h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="col-md-md-1 col-sm-1 col-xs-2">
                                        <img src="assets/images/user.jpg" alt="cruise">
                                    </div>
                                    <div class="col-md-md-3 col-sm-3 col-xs-3">
                                        <span>Lenore, USA</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="individual-review">
                                    <h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="col-md-md-1 col-sm-1 col-xs-2">
                                        <img src="assets/images/user.jpg" alt="cruise">
                                    </div>
                                    <div class="col-md-md-3 col-sm-3 col-xs-3">
                                        <span>Lenore, USA</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="individual-review dark-review">
                                    <h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="col-md-md-1 col-sm-1 col-xs-2">
                                        <img src="assets/images/user.jpg" alt="cruise">
                                    </div>
                                    <div class="col-md-md-3 col-sm-3 col-xs-3">
                                        <span>Lenore, USA</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="individual-review">
                                    <h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="col-md-md-1 col-sm-1 col-xs-2">
                                        <img src="assets/images/user.jpg" alt="cruise">
                                    </div>
                                    <div class="col-md-md-3 col-sm-3 col-xs-3">
                                        <span>Lenore, USA</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="individual-review dark-review">
                                    <h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="col-md-md-1 col-sm-1 col-xs-2">
                                        <img src="assets/images/user.jpg" alt="cruise">
                                    </div>
                                    <div class="col-md-md-3 col-sm-3 col-xs-3">
                                        <span>Lenore, USA</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="load-more text-center">
                                    <a href="#">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div id="write-review" class="tab-pane fade">
                        <h4 class="tab-heading">Write A Review</h4>
                        <form >
                            <label>Review Title</label>
                            <input type="text" class="form-control" name="review-titile" required>
                            <label for="comment">Comment</label>
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                            <label>Value for Money (Rate out of 5)</label>
                            <input type="text" class="form-control" name="value-for-money">
                            <label>Hotel Atmosphere (Rate out of 5)</label>
                            <input type="text" class="form-control" name="atmosphere">
                            <label>Staff Behaviour (Rate out of 5)</label>
                            <input type="text" class="form-control" name="staff-beh">
                            <label>Food Quality (Rate out of 5)</label>
                            <input type="text" class="form-control" name="food-quality">
                            <label>Rooms (Rate out of 5)</label>
                            <input type="text" class="form-control" name="room">
                            <div class="text-center">
                                <button type="submit" class="btn btn-default submit-review">Submit</button>
                            </div>
                        </form>
                    </div> --}}
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
                                <input type="hidden" value="{{ $hotel->id }}" name="service_id">
                                <input type="hidden" value="hotel" name="booking_type">
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
                        <h5><i class="fa fa-phone"></i> +91 {{ $hotel->mobile }}</h5>
                        <h5><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $hotel->email }}">Send Email</a></h5>
                        <h5><i class="fa fa-map-marker"></i> {{ $hotel->address }}, {{ $hotel->city }}, {{ $hotel->country }}, {{ $hotel->pin_code }}</h5>
                    </div>
                </div>
                {{-- <div class="review sidebar-item">
                    <h4><i class="fa fa-edit"></i> Hotel Reviews</h4>
                    <div class="sidebar-item-body text-center">
                        <div class="rating-box">
                            <div class="col-md-6 col-sm-6 col-xs-6 clear-padding tripadvisor">
                                <img src="assets/images/tripadvisor.png" alt="cruise"><br>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <h5>4.0/5.0 Based on 12 Reviews</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                <i class="fa fa-users"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <h5>Based on 128 Guest Reviews</h5>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="guest-say rating-box">
                            <h2><i class="fa fa-check-circle"></i> Perfect</h2>
                            <div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5 clear-padding user-img">
                                <img src="assets/images/user.jpg" alt="cruise">
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7 clear-padding user-name">
                                <span>Lenore, USA</span>
                                <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="similar-hotel sidebar-item">
                    <h4><i class="fa fa-bed"></i> Similar Hotel</h4>
                    <div class="sidebar-item-body">
                        @foreach ($similar_hotel as $similar)
                            <div class="similar-hotel-box">
                                <a href="{{ route('frontend.hotels.show',$similar->slug) }}">
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
                        {{-- <div class="similar-hotel-box">
                            <a href="#">
                                <div class="col-md-5 col-sm-5 col-xs-5 clear-padding">
                                    <img src="assets/images/offer2.jpg" alt="Cruise">
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <h5>Royal Resort 5<span><i class="fa fa-star"></i></span></h5>
                                    <h5><i class="fa fa-map-marker"></i> Mall Road, Shimla</h5>
                                    <span>$100/Night</span>
                                </div>
                            </a>
                        </div>
                        <div class="similar-hotel-box">
                            <a href="#">
                                <div class="col-md-5 col-sm-5 col-xs-5 clear-padding">
                                    <img src="assets/images/offer3.jpg" alt="Cruise">
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <h5>Royal Resort 4<span><i class="fa fa-star"></i></span></h5>
                                    <h5><i class="fa fa-map-marker"></i> Mall Road, Shimla</h5>
                                    <span>$100/Night</span>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
