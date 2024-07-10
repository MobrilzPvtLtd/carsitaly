@extends('frontend.layouts.services-app')

@section('title') {{$$module_name_singular->title}} - {{ __($module_title) }} @endsection

@section('services-content')
	<!-- START: PAGE TITLE -->
	<div class="row page-title">
		<div class="container clear-padding text-center">
			<h3>{{ $tour->title }}</h3>
			{{-- <h4>{{ $tour->duration }} Nights --}}
                {{-- /7 Days --}}
            {{-- </h4> --}}
			{{-- <span>{{ $tour->city }} --}}
                {{-- (2)<i class="fa fa-long-arrow-right"></i>London (2)<i class="fa fa-long-arrow-right"></i>Amesterdam (2) --}}
            {{-- </span> --}}
		</div>
	</div>
	<!-- END: PAGE TITLE -->

	<div class="row package-detail">
		<div class="container clear-padding">
			<div class="main-content col-md-8">
				<!-- START: HOLIDAY GALLERY -->
				<div id="gallery" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#gallery" data-slide-to="0" class="active"></li>
						<li data-target="#gallery" data-slide-to="1"></li>
						<li data-target="#gallery" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
                        @if($tour->images)
                            @php
                                $images = json_decode($tour->images);
                            @endphp
                            @if ($images && count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <div class="item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('public/storage/' . $image) }}" alt="{{ $tour->title }}">
                                    </div>
                                @endforeach
                            @endif
                        @endif
					</div>
					<a class="left carousel-control" href="#gallery" role="button" data-slide="prev">
						<span class="fa fa-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#gallery" role="button" data-slide="next">
						<span class="fa fa-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<!-- END: HOLIDAY GALLRY -->
				<div class="package-complete-detail">
					<ul class="nav nav-tabs tabs001">
						<li class="active"><a data-toggle="tab" href="#Tour_Information
                        "><i class="fa fa-suitcase"></i> <span>Tour Information
                        </span></a></li>
						<li><a data-toggle="tab" href="#Location_Details"><i class="fa fa-check-square"></i> <span>Location Details</span></a></li>
						<li><a data-toggle="tab" href="#Pricing_and_Availability"><i class="fa fa-street-view"></i> <span>Pricing and Availability</span></a></li>
						<li><a data-toggle="tab" href="#Itinerary
                        "><i class="fa fa-street-view"></i> <span>Itinerary
                        </span></a></li>
						{{-- <li><a data-toggle="tab" href="#Reviews and Ratings
                        "><i class="fa fa-street-view"></i> <span>Reviews and Ratings
                        </span></a></li> --}}
						<li><a data-toggle="tab" href="#Media
                        "><i class="fa fa-street-view"></i> <span>Media
                        </span></a></li>
						{{-- <li><a data-toggle="tab" href="#add-info"><i class="fa fa-info-circle"></i> <span>Additional Info</span></a></li> --}}
					</ul>
					<div class="tab-content">
						<div id="overview" class="tab-pane fade">
							<h4 class="tab-heading">Overview</h4>
							<p>
								{{ $tour->description }}
							</p>
							<h4 class="tab-heading">Inclusion</h4>
							<p class="inc">
                                {{-- @php
                                    $tourincArray = json_decode($tourinc, true);
                                @endphp --}}

                                {{-- @foreach ($tourincArray as $tinc)
                                    <i class="fa fa-check-circle"></i> {{ $tinc }}<br>
                                @endforeach --}}
								{{-- <i class="fa fa-check-circle"></i> Return Economy economy class airfare<br>
                                    <i class="fa fa-check-circle"></i> Welcome drinks at hotel<br>
                                    <i class="fa fa-check-circle"></i> Stay in 3 star hotel<br>
                                    <i class="fa fa-check-circle"></i> Guided tour<br>
                                    <i class="fa fa-check-circle"></i> Sighseeing<br>
                                    <i class="fa fa-check-circle"></i> Airport transport<br>
                                    <i class="fa fa-check-circle"></i> Buffet breakfast<br>
                                    <i class="fa fa-check-circle"></i> Return Economy economy class airfare<br>
                                    <i class="fa fa-check-circle"></i> Welcome drinks at hotel<br>
								<i class="fa fa-check-circle"></i> Stay in 3 star hotel<br> --}}
							</p>
							{{-- <h4 class="tab-heading">Exclusion</h4>
							    <p class="inc">
								<i class="fa fa-times-circle-o"></i> Travel insurance<br>
								<i class="fa fa-times-circle-o"></i> Increase in airfare<br>
								<i class="fa fa-times-circle-o"></i> Airport fees<br>
								<i class="fa fa-times-circle-o"></i> Travel insurance<br>
								<i class="fa fa-times-circle-o"></i> Increase in airfare<br>
								<i class="fa fa-times-circle-o"></i> Airport fees<br>
							</p> --}}
						</div>
						<div id="Tour_Information" class="tab-pane fade in active">
							<h4 class="tab-heading">Tour Name: {{ $tour->title }}
                            </h4>
                            <p><b>Description:</b> {{ $tour->description }}</p>
						</div>
                        <div id="Location_Details" class="tab-pane fade">
							<h4 class="tab-heading"> Starting Point: {{ $tour->starting_point }}</h4>
                            <h4 class="tab-heading"> Ending Point: {{ $tour->ending_point }}</h4>
                            <p><b>Destinations Covered:</b> {{ $tour->destinations }}</p>
                            <p><b>Duration:</b> {{ $tour->duration }}</p>
                            <p><b> Start Time:</b> {{ $tour->start_date }}</p>
                            <p><b> End Time:</b> {{ $tour->end_date }}</p>
						</div>
                        <div id="Pricing_and_Availability" class="tab-pane fade">
							<h4 class="tab-heading"> Base Price: {{ $tour->price }}</h4>
						</div>
                        <div id="Itinerary" class="tab-pane fade">
							<h4 class="tab-heading"> Day-by-Day Itinerary: {{ $tour->itinerary }}</h4>
                            <p><b> Activity Details</b> {{ $tour->description_details }}</p>
                            <p><b> Free Time:</b> {{ $tour->free_time }}</p>
						</div>
                        <div id="Media" class="tab-pane fade">
						<h4 class="tab-heading">Tour Images:</h4>
                        @if ($tour->images)
                            @php
                                $images = json_decode($tour->images);
                            @endphp
                            @if ($images && count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <img src="{{ asset('public/storage/' . $image) }}" alt="Tour" width="100px">
                                @endforeach
                            @endif
                        @endif
                        <h4> Video Tours:</h4>
                        @if ($tour->videos)
                            <video width="320" height="240" controls>
                                <source src="{{ asset('public/storage/tour/' . $tour->videos) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
						</div>
						<div id="itinerary" class="tab-pane fade">
							<h4 class="tab-heading">Package Itinerary</h4>
                            @php
                                $packages = App\Models\Package::where('service_id', $tour->id)->get();
                            @endphp
                            @foreach ($packages as $package)
                                <div class="daily-schedule">
                                    <div class="title">
                                        <p><span>Day {{ $package->validity }}</span>{{ $package->city }}</p>
                                    </div>
                                    <div class="daily-schedule-body">
                                        <div class="col-md-4 col-sm-4">
                                            <img src="{{ asset('public/storage/') . '/' . $package->image }}" alt="" width="100px">
                                            {{-- <img src="assets/images/tour1.jpg" alt="cruise"> --}}
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <p>{{ $package->description }}</p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 activity">
                                            <h4>Included</h4>
                                            @php
                                                $includedArray = json_decode($package->inclusion);
                                            @endphp

                                            @foreach ($includedArray as $included)
                                                <div class="col-md-6 col-sm-6">
                                                    <p><i class="fa fa-check-square"></i> {{ $included }}</p>
                                                </div>
                                            @endforeach
                                            {{-- <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Welcome drinks at hotel</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Buffet dinner</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Guided city tour</p>
                                            </div> --}}
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
							{{-- <div class="daily-schedule">
								<div class="title">
									<p><span>Day 2</span>Paris City Tour</p>
								</div>
								<div class="daily-schedule-body">
									<div class="col-md-4 col-sm-4">
										<img src="assets/images/tour1.jpg" alt="cruise">
									</div>
									<div class="col-md-8 col-sm-8">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12 activity">
										<h4>Included</h4>
										<div class="col-md-6 col-sm-6">
											<p><i class="fa fa-check-square"></i> Taxi transfer from airport</p>
										</div>
										<div class="col-md-6 col-sm-6">
											<p><i class="fa fa-check-square"></i> Welcome drinks at hotel</p>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-6">
											<p><i class="fa fa-check-square"></i> Buffet dinner</p>
										</div>
										<div class="col-md-6 col-sm-6">
											<p><i class="fa fa-check-square"></i> Guided city tour</p>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
                                </div>
                                <div class="daily-schedule">
								<div class="title">
									<p><span>Day 3</span>Amsterdam</p>
								</div>
								<div class="daily-schedule-body">
									<div class="col-md-4 col-sm-4">
										<img src="assets/images/tour1.jpg" alt="cruise">
									</div>
									<div class="col-md-8 col-sm-8">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12 activity">
										<h4>Included</h4>
										<div class="col-md-6 col-sm-6">
											<p><i class="fa fa-check-square"></i> Taxi transfer from airport</p>
										</div>
										<div class="col-md-6 col-sm-6">
											<p><i class="fa fa-check-square"></i> Welcome drinks at hotel</p>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-6">
											<p><i class="fa fa-check-square"></i> Buffet dinner</p>
										</div>
										<div class="col-md-6 col-sm-6">
											<p><i class="fa fa-check-square"></i> Guided city tour</p>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div> --}}
						</div>
						{{-- <div id="add-info" class="tab-pane fade">
							<h4 class="tab-heading">Inclusion</h4>
							<p class="inc">
								<i class="fa fa-check-circle"></i> Return Economy economy class airfare<br>
								<i class="fa fa-check-circle"></i> Welcome drinks at hotel<br>
								<i class="fa fa-check-circle"></i> Stay in 3 star hotel<br>
								<i class="fa fa-check-circle"></i> Guided tour<br>
								<i class="fa fa-check-circle"></i> Sighseeing<br>
								<i class="fa fa-check-circle"></i> Airport transport<br>
								<i class="fa fa-check-circle"></i> Buffet breakfast<br>
								<i class="fa fa-check-circle"></i> Return Economy economy class airfare<br>
								<i class="fa fa-check-circle"></i> Welcome drinks at hotel<br>
								<i class="fa fa-check-circle"></i> Stay in 3 star hotel<br>
							</p>
							<h4 class="tab-heading">Exclusion</h4>
							<p class="inc">
								<i class="fa fa-times-circle-o"></i> Travel insurance<br>
								<i class="fa fa-times-circle-o"></i> Increase in airfare<br>
								<i class="fa fa-times-circle-o"></i> Airport fees<br>
								<i class="fa fa-times-circle-o"></i> Travel insurance<br>
								<i class="fa fa-times-circle-o"></i> Increase in airfare<br>
								<i class="fa fa-times-circle-o"></i> Airport fees<br>
							</p>
						</div> --}}
					</div>
                    <div class="similar-hotel sidebar-item">
						<h4><i class="fa fa-bed"></i> Similar Tours</h4>
						<div class="sidebar-item-body">
							<div class="similar-hotel-box">
								<a href="#">
									<div class="col-md-5 col-sm-5 col-xs-5 clear-padding">
										<img src="assets/images/offer1.jpg" alt="Cruise">
									</div>
									<div class="col-md-7 col-sm-7 col-xs-7">
										<h5>Royal Resort 3<span><i class="fa fa-star"></i></span></h5>
										<h5><i class="fa fa-map-marker"></i> Mall Road, Shimla</h5>
										<span>$100/Night</span>
									</div>
								</a>
							</div>
							<div class="similar-hotel-box">
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
							</div>
						</div>
					</div>
                    
				</div>
			</div>
			<div class="col-md-4 package-detail-sidebar">
				<div class="col-md-12 sidebar-wrapper clear-padding">
					{{-- <div class="package-summary sidebar-item">
						<h4><i class="fa fa-bookmark"></i> Package Summary</h4>
						<div class="package-summary-body">
							<h5><i class="fa fa-heart"></i>Theme</h5>
							<p>Honeymoon, Group, Beach</p>
							<h5><i class="fa fa-map-marker"></i>Departure From</h5>
							<p>New Delhi, Mumbai</p>
							<h5><i class="fa fa-globe"></i>Itinerary</h5>
							<p>Paris (2), London (2), Amesterdam (2)</p>
						</div>
						<div class="package-summary-footer text-center">
							<div class="col-md-6 col-sm-6 col-xs-6 price">
								<h5>Starting From</h5>
								<h5>$999/Person</h5>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 book">
								<a href="#">BOOK NOW</a>
							</div>
						</div>
					</div> --}}
					<div class="sidebar-booking-box">
						<h3 class="text-center">MAKE A BOOKING</h3>
						<div class="booking-box-body">
							<form action="{{ route('booking') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $tour->id }}" name="service_id">
                                <input type="hidden" value="tour" name="booking_type">
								{{-- <div class="col-md-12 col-sm-12 col-xs-12">
									<label>Start</label>
									<div class="input-group margin-bottom-sm">
										<input type="text" id="check_in" name="start_date" class="form-control" placeholder="DD/MM/YYYY" required>
										<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
									</div>
								</div> --}}
                                {{-- <div class="col-md-12 col-sm-12 col-xs-12">
									<label>End</label>
									<div class="input-group margin-bottom-sm">
										<input type="text" id="check_out" name="end_date" class="form-control" placeholder="DD/MM/YYYY" required>
										<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
									</div>
								</div> --}}
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
					<div class="assistance-box sidebar-item">
						<h4><i class="fa fa-phone"></i> Need Assistance</h4>
						<div class="assitance-body text-center">
							<h5>Need Help? Call us or drop a message. Our agents will be in touch shortly.</h5>
							<h2>+91 {{ $tour->mobile }}</h2>
							<h3>Or</h3>
							<a href="mailto:{{ $tour->email }}"><i class="fa fa-envelope-o"></i> Email Us</a>
						</div>
					</div>
					{{-- <div class="review sidebar-item">
						<h4><i class="fa fa-comments"></i> Package Reviews</h4>
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
				</div>
			</div>
		</div>
	</div>

@endsection
