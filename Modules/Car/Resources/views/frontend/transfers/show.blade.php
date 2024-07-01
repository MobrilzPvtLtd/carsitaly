@extends('frontend.layouts.services-app')

@section('title')
    {{ $$module_name_singular->title }} - {{ __($module_title) }}
@endsection

@section('services-content')
    <div class="row page-title">
        <div class="container clear-padding text-center">
            <h3>{{ $transfer->title }}</h3>
            {{-- <h5>
                @for ($i = 1; $i < 5; $i++)
                    @if ($i <= $transfer->rating)
                        <i class="fa fa-star"></i>
                    @else
                        <i class="fa fa-star-o"></i>
                    @endif
                @endfor
            </h5>
            <p><i class="fa fa-map-marker"></i> {{ $transfer->city }}, {{ $transfer->pin_code }}</p> --}}
        </div>
    </div>
    <!-- END: PAGE TITLE -->

    <!-- START: ROOM GALLERY -->
    <div class="row hotel-detail">
        <div class="container">
            <div class="main-content col-md-8">
                <div id="room-gallery" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#room-gallery" data-slide-to="0" class="active"></li>
                        <li data-target="#room-gallery" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        {{-- <div class="item active">
							<img src="assets/images/slide2.jpg" alt="Cruise">
						</div>
						<div class="item">
							<img src="assets/images/slide.jpg" alt="Cruise">
						</div> --}}
                        @if ($transfer->images)
                            @php
                                $images = json_decode($transfer->images);
                            @endphp
                            @if ($images && count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <div class="item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('public/storage/' . $image) }}" alt="car">
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
                        <li class="active"><a data-toggle="tab" href="#Transfer_Information
                            "><i class="fa fa-bolt"></i>
                            <span>Transfer Information </span></a>
                        </li>
                        <li><a data-toggle="tab" href="#Vehicle_Details
                            "><i class="fa fa-bolt"></i>
                            <span>Vehicle Details </span></a>
                        </li>
                        <li><a data-toggle="tab" href="#Pricing_and_Availability
                            "><i class="fa fa-bolt"></i>
                            <span>Pricing and Availability </span></a>
                        </li>

                        {{-- <li><a data-toggle="tab" href="#review"><i class="fa fa-comments"></i> <span>Reviews</span></a></li> --}}
                        {{-- <li><a data-toggle="tab" href="#write-review"><i class="fa fa-edit"></i> <span>Write Review</span></a></li> --}}
                    </ul>
                    <div class="tab-content">
                        <div id="Transfer_Information" class="tab-pane active in fade">
                            <h4 class="tab-heading">Transfer Name: Name of the transfer service.</h4>
                            <p> <b>.Description:</b> Detailed description of the transfer service.
                            </p>
                        </div>
                        <div id="Vehicle_Details" class="tab-pane fade ">
                            <h4 class="tab-heading"> Vehicle Type: Type of vehicle (e.g., sedan, SUV, van).</h4>
                            <p> <b>Vehicle Capacity:</b> Amount of luggage the vehicle can carry.
                            </p>
                            <p> <b>Luggage Capacity:</b> Number of passengers the vehicle can accommodate.
                            </p>
                            <p> <b> Vehicle Features:</b> List of features (e.g., air conditioning, Wi-Fi, child seats).
                            </p>
                        </div>
                        <div id="Pricing_and_Availability" class="tab-pane fade ">
                            <h4 class="tab-heading"> Base Price: Starting price for the transfer.</h4>
                        </div>
                        {{-- <div id="review" class="tab-pane fade">
							<h4 class="tab-heading">CAR REVIEWS</h4>
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
						</div>
						<div id="write-review" class="tab-pane fade">
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
                    <div class="contact sidebar-item">
                        <div class="sidebar-booking-box">
                            <h3 class="text-center">MAKE A BOOKING</h3>
                            <div class="booking-box-body">
                                <form action="{{ route('booking') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $transfer->id }}" name="service_id">
                                    <input type="hidden" value="car" name="booking_type">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label> Pickup Location</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="check_in" name="start_date" class="form-control"
                                                placeholder="e.g London" required>
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label> Intermediate Stops</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="check_in" name="start_date" class="form-control"
                                                placeholder="e.g Super Market" required>
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label> Dropoff Location</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="check_in" name="start_date" class="form-control"
                                                placeholder="e.g New York" required>
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label> Pickup Date</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="check_in" name="start_date" class="form-control"
                                                placeholder="DD/MM/YYYY" required>
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label> Dropoff Date</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="check_out" name="end_date" class="form-control"
                                                placeholder="DD/MM/YYYY" required>
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
                                    @if (!Auth::check())
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Name</label>
                                            <input type="text" id="check_in" name="name" class="form-control"
                                                placeholder="Enter Your Name">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Email</label>
                                            <input type="text" id="check_in" name="email" class="form-control"
                                                placeholder="Enter Your Email">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Mobile</label>
                                            <input type="text" id="check_in" name="mobile" class="form-control"
                                                placeholder="Enter Your Mobile">
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
                        <h4><i class="fa fa-phone"></i> Contact Agent</h4>
                        <div class="sidebar-item-body">
                            <h5><i class="fa fa-phone"></i> +91 {{ $transfer->mobile }}</h5>
                            <h5><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $transfer->email }}">Send Email</a>
                            </h5>
                            <h5><i class="fa fa-map-marker"></i> {{ $transfer->address }}, {{ $transfer->city }},
                                {{ $transfer->country }}, {{ $transfer->pin_code }}</h5>
                        </div>
                    </div>
                    {{-- <div class="review sidebar-item">
						<h4><i class="fa fa-edit"></i> Car Reviews</h4>
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
                        <h4><i class="fa fa-taxi"></i> Similar Cars</h4>
                        <div class="sidebar-item-body">
                            @foreach ($similar_cars as $similar)
                                <div class="similar-hotel-box">
                                    <a href="{{ route('frontend.transfers.show', $similar->slug) }}">
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
                                            <h5><i class="fa fa-certificate"></i> {{ $similar->brand }}</h5>
                                            <span>${{ $similar->price }}/Day</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            {{-- <div class="similar-hotel-box">
								<a href="#">
									<div class="col-md-5 col-sm-5 col-xs-5 clear-padding">
										<img src="assets/images/tour1.jpg" alt="Cruise">
									</div>
									<div class="col-md-7 col-sm-7 col-xs-7">
										<h5>HONDA AMAZE</h5>
										<h5><i class="fa fa-certificate"></i> HONDA</h5>
										<span>$100/Day</span>
									</div>
								</a>
							</div> --}}
                            {{-- <div class="similar-hotel-box">
								<a href="#">
									<div class="col-md-5 col-sm-5 col-xs-5 clear-padding">
										<img src="assets/images/tour1.jpg" alt="Cruise">
									</div>
									<div class="col-md-7 col-sm-7 col-xs-7">
										<h5>C-CLASS</h5>
										<h5><i class="fa fa-certificate"></i> MERCEDES</h5>
										<span>$50/Day</span>
									</div>
								</a>
							</div>
							<div class="similar-hotel-box">
								<a href="#">
									<div class="col-md-5 col-sm-5 col-xs-5 clear-padding">
										<img src="assets/images/tour1.jpg" alt="Cruise">
									</div>
									<div class="col-md-7 col-sm-7 col-xs-7">
										<h5>AUDI R8</h5>
										<h5><i class="fa fa-certificate"></i> AUDI</h5>
										<span>$90/Day</span>
									</div>
								</a>
							</div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: ROOM GALLERY -->

@endsection
