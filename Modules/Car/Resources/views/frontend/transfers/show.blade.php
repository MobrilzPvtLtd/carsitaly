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
                    <ul class="nav nav-tabs tabs001">
                        <li class="active"><a data-toggle="tab" href="#Transfer_Information
                            "><i class="fa fa-bolt"></i>
                            <span>Transfer Information </span></a>
                        </li>
                        <li><a data-toggle="tab" href="#Vehicle_Details
                            "><i class="fa fa-bolt"></i>
                            <span>Vehicle Details </span></a>
                        </li>
                        {{-- <li><a data-toggle="tab" href="#Pricing_and_Availability
                            "><i class="fa fa-bolt"></i>
                            <span>Pricing and Availability </span></a>
                        </li> --}}

                        {{-- <li><a data-toggle="tab" href="#review"><i class="fa fa-comments"></i> <span>Reviews</span></a></li> --}}
                        {{-- <li><a data-toggle="tab" href="#write-review"><i class="fa fa-edit"></i> <span>Write Review</span></a></li> --}}
                    </ul>
                    <div class="tab-content">
                        <div id="Transfer_Information" class="tab-pane active in fade">
                            <h4 class="tab-heading">VEHICLE NAME: {{ $transfer->title }}</h4>
                            <p><b>Description:</b> {{ $transfer->description }} </p>
                        </div>
                        <div id="Vehicle_Details" class="tab-pane fade">
                            <h4 class="tab-heading"> Vehicle Type: {{ $transfer->vehicle_type }}</h4>
                            <p> <b>Vehicle Capacity:</b> {{ $transfer->vehicle_capacity }} </p>
                            <p> <b>Luggage Capacity:</b> {{ $transfer->luggage_capacity }}</p>
                            <p> <b> Vehicle Features:</b>
                                @if ($transfer->vehicle_features > 0)
                                    @foreach (json_decode($transfer->vehicle_features) as $amenities)
                                        {{ ucfirst(strtolower($amenities)) }},
                                    @endforeach
                                @endif
                            </p>
                        </div>
                        {{-- <div id="Pricing_and_Availability" class="tab-pane fade ">
                            <h4 class="tab-heading"> Base Price: Starting price for the transfer.</h4>
                        </div> --}}
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

                <hr>
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
                    </div>
                </div>
            </div>
            <div class="col-md-4 hotel-detail-sidebar">
                <div class="col-md-12 sidebar-wrapper clear-padding">
                    <div class="contact sidebar-item">
                        <div class="sidebar-booking-box">
                            <h3 class="text-center">MAKE A BOOKING</h3>
                            <div class="booking-box-body">
                                <form action="http://localhost/booking" method="POST">
                                    <input type="hidden" name="_token" value="tcf5Tjz2XYiMiM2lmFpM4Okx4m63P0OztPsmnFFS"
                                        autocomplete="off"> <input type="hidden" value="13" name="service_id">
                                    <input type="hidden" value="hotel" name="booking_type">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label>Mode of travel</label>
                                        <select class="selectpicker" name="travel" id="travel">
                                            <option value="flight">By flight</option>
                                            <option value="train">By train</option>
                                            <option value="bus">By bus</option>
                                        </select>
                                    </div>
                                    {{-- by flight --}}
                                    <div class="col-md-12 col-sm-12 col-xs-12 flight section">
                                        <label> Arrival location</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="arrival-location" name="pickup_location" class="form-control" placeholder="e.g I.G.I Airport" required>
                                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 flight section">
                                        <label> Treminal</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="terminal" name="terminal" class="form-control" placeholder="e.g Treminal 2" required>
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 flight section">
                                        <label> Flight number</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="flight-number" name="flight_number" class="form-control" placeholder="e.g IX 807" required>
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 flight section">
                                        <label> Drop-off location</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="drop_location" name="drop_location" class="form-control"
                                                placeholder="e.g Hotel" required>
                                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                        </div>
                                    </div>

                                    {{-- by Train --}}
                                    <div class="col-md-12 col-sm-12 col-xs-12 train section">
                                        <label> Arrival location</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="arrival" name="pickup_location" class="form-control"
                                                placeholder="e.g Station name" required>
                                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 train section">
                                        <label> Platform</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="" name="platform" class="form-control"
                                                placeholder="e.g Platform 2" required>
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 train section">
                                        <label> Train number </label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="" name="train_number" class="form-control"
                                                placeholder="e.g 223807" required>
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 train section">
                                        <label> Drop-off location</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="end" name="drop_location" class="form-control"
                                                placeholder="e.g Hotel" required>
                                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                        </div>
                                    </div>

                                    {{-- by Bus --}}
                                    <div class="col-md-12 col-sm-12 col-xs-12 bus section">
                                        <label> Arrival location</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="start_bus" name="pickup_location" class="form-control" placeholder="e.g Bus stop name" required>
                                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 bus section">
                                        <label> Bus number</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="" name="bus_number" class="form-control"
                                                placeholder="e.g 223807" required>
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 bus section">
                                        <label> Drop-off location</label>
                                        <div class="input-group margin-bottom-sm">
                                            <input type="text" id="end_bus" name="drop_location" class="form-control" placeholder="e.g Hotel" required>
                                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    {{-- <div class="room-price">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <label><input type="checkbox" name="room_type" value="double" id="double" onchange="toggleCheckbox(this)"><span>Deluxe Double Room</span></label>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <h5>$199/Night</h5>
                                        </div>
                                    </div> --}}
                                    <div class="clearfix"></div>
                                    {{-- <div class="room-price">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <label><input type="checkbox" name="room_type" value="royal" id="royal" onchange="toggleCheckbox(this)"><span>Royal Suite</span></label>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <h5>$299/Night</h5>
                                        </div>
                                    </div> --}}
                                    <div class="clearfix"></div>
                                    <div class="grand-total text-center">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4>Total $ {{ $transfer->price }}</h4>
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
                            {{-- <h5><i class="fa fa-map-marker"></i> {{ $transfer->address }}, {{ $transfer->city }},
                                {{ $transfer->country }}, {{ $transfer->pin_code }}</h5> --}}
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

                </div>
            </div>
        </div>
    </div>
    <!-- END: ROOM GALLERY -->

@endsection
@push('after-scripts')
<script type="module">
    $(document).ready(function() {
        var travelVal = $("#travel").val();
        $('.section').hide();
        $('.' + travelVal).show();
        // console.log(travelVal);

        $("#travel").change(function() {
            var value = $(this).val();
            console.log(value);
            $('.section').hide();
            $('.' + value).show();
        });
    });
</script>
@endpush
