@extends('frontend.layouts.services-app')

@section('title') {{$$module_name_singular->title}} - {{ __($module_title) }} @endsection

@section('services-content')
	<div class="row page-title">
        <div class="container clear-padding text-center">
            <h3>{{ $car->title }}</h3>
            <h5>
                @for ($i = 1; $i < 5; $i++)
                    @if($i <= $car->rating)
                        <i class="fa fa-star"></i>
                    @else
                        <i class="fa fa-star-o"></i>
                    @endif
                @endfor
            </h5>
            <p><i class="fa fa-map-marker"></i> {{ $car->city }}, {{ $car->pin_code }}</p>
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
                        @if($car->image)
                        @php
                            $images = json_decode($car->image);
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
						<li class="active"><a data-toggle="tab" href="#overview"><i class="fa fa-bolt"></i> <span>Overview</span></a></li>
						{{-- <li><a data-toggle="tab" href="#review"><i class="fa fa-comments"></i> <span>Reviews</span></a></li> --}}
						{{-- <li><a data-toggle="tab" href="#write-review"><i class="fa fa-edit"></i> <span>Write Review</span></a></li> --}}
					</ul>
					<div class="tab-content">
						<div id="overview" class="tab-pane active in fade">
							<h4 class="tab-heading">OVERVIEW</h4>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-tint"></i>{{ $car->engine_type }}</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-dashboard"></i>{{ $car->transmission }}</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-users"></i>{{ $car->seating_capacity }} People</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-taxi"></i>{{ $car->top_speed }} Doors</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-suitcase"></i>{{ $car->mileage }} KG</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-calendar"></i>{{ $car->warranty }} Year</div>
							<div class="clearfix"></div>
							<div class="rent-box">
								<div class="add-ons col-md-6 col-sm-6">
									<ul>
										<li><input type="checkbox">Child Seat <span class="pull-right">$12/Day</span></li>
										<li><input type="checkbox">Satelite Navigation <span class="pull-right">$49/Day</span></li>
										<li><input type="checkbox">Music System <span class="pull-right">$99/Day</span></li>
										<li><input type="checkbox">Child Seat <span class="pull-right">$12/Day</span></li>
										<li><input type="checkbox">Satelite Navigation <span class="pull-right">$49/Day</span></li>
									</ul>
								</div>
								<div class="rent-detail col-md-6 col-sm-6">
									<ul>
										<li>Daily Rent <span class="pull-right">$99</span></li>
										<li>Rental Price <span class="pull-right">$495</span></li>
										<li class="duration-sm"><i>5 (Days 21 - Aug 25 Aug)</i></li>
										<li>Add Ons <span class="pull-right">$55</span></li>
										<li class="rental-total">Grand Total<span class="pull-right">$550</span></li>
									</ul>
								</div>
								<div class="clearfix"></div>
								<div class="reserve-car text-center">
									<a href="#">RESERVE NOW</a>
								</div>
							</div>
							<div class="clearfix"></div>
							<h4 class="tab-heading">Brief Description of Car</h4>
							<p>{{ $car->description }}</p>
							<h4 class="tab-heading">Car Features</h4>
							<ul class="check-list">
                                @php
                                    $carFeaturesArray = json_decode($carFeature, true);
                                @endphp

                                @foreach ($carFeaturesArray as $feature)
                                    <li class="col-md-5 col-sm-5">{{ $feature }}</li>
                                @endforeach
								{{-- <li class="col-md-5 col-sm-5">GPS Navigation</li>
								<li class="col-md-5 col-sm-5">Automatic Transmission</li>
								<li class="col-md-5 col-sm-5">FM Radio</li>
								<li class="col-md-5 col-sm-5">4 Doors & Panorama View</li>
								<li class="col-md-5 col-sm-5">Hi FI Sound System</li>
								<li class="col-md-5 col-sm-5">Mileage 12KM/Liter</li>
								<li class="col-md-5 col-sm-5">Mileage 12KM/Liter</li>
								<li class="col-md-5 col-sm-5">4 Doors & Panorama View</li>
								<li class="col-md-5 col-sm-5">Hi FI Sound System</li>
								<li class="col-md-5 col-sm-5">GPS Navigation</li>
								<li class="col-md-5 col-sm-5">Automatic Transmission</li>
								<li class="col-md-5 col-sm-5">FM Radio</li> --}}
							</ul>
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
						<h4><i class="fa fa-phone"></i> Contact Agent</h4>
						<div class="sidebar-item-body">
							<h5><i class="fa fa-phone"></i> +91 {{ $car->mobile }}</h5>
							<h5><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $car->email }}">Send Email</a></h5>
							<h5><i class="fa fa-map-marker"></i> {{ $car->address }}, {{ $car->city }}, {{ $car->country }}, {{ $car->pin_code }}</h5>
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
                                <a href="{{ route('frontend.hotels.show',$similar->slug) }}">
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
