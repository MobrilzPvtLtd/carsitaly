@extends('frontend.layouts.services-app')

@section('title')
    {{ $$module_name_singular->title }} - {{ __($module_title) }}
@endsection

@section('services-content')

    <!-- START: PAGE TITLE -->
    <div class="row page-title">
        <div class="container clear-padding text-center">
            <h3>{{ $cruise->title }}</h3>
            {{-- <h4>6 Nights/7 Days</h4>
        <span>{{ $cruise->city }} (2)<i class="fa fa-long-arrow-right"></i>London (2)<i
                class="fa fa-long-arrow-right"></i>Amesterdam (2)</span> --}}
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
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @if ($cruise->images)
                            @php
                                $images = json_decode($cruise->images);
                            @endphp
                            @if ($images && count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <div class="item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('public/storage/' . $image) }}" alt="{{ $cruise->title }}">
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
                <!-- END: CRUISE GALLRY -->
                <div class="package-complete-detail">
                    <ul class="nav nav-tabs tabs001">
                        <li class="active"><a data-toggle="tab" href="#Cruise_Information
                        "><i class="fa fa-ship"></i><span>Cruise Information </span></a></li>
                        <li><a data-toggle="tab" href="#Itinerary_and_Destinations"><i class="fa fa-globe"></i><span>Itinerary and Destinations</span></a></li>
                        <li><a data-toggle="tab" href="#Pricing_and_Packages"><i class="fa fa-check-square"></i><span>Pricing and Packages</span></a></li>
                        <li><a data-toggle="tab" href="#Onboard_Services_and_Amenities"><i class="fa fa-map-marker"></i><span>Onboard Services and Amenities</span></a></li>
                        <li><a data-toggle="tab" href="#Safety_and_Regulations"><i class="fa fa-map-marker"></i><span>Safety and Regulations</span></a></li>
                        {{-- <li><a data-toggle="tab" href="#Reviews_and_Ratings"><i class="fa fa-map-marker"></i> <span>Reviews and Ratings
                            </span></a></li> --}}
                        <li><a data-toggle="tab" href="#Cabin_and_Accommodation_Details"><i class="fa fa-map-marker"></i> <span>Cabin and Accommodation Details</span></a></li>
                        <li><a data-toggle="tab" href="#Media_Management"><i class="fa fa-map-marker"></i> <span>Media Management</span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="Cruise_Information" class="tab-pane active in fade">
                            <h4 class="tab-heading">Cruise Name: {{ $cruise->title }}</h4>
                            <p>
                                <b>Description:</b> {{ $cruise->description }}
                            </p>
                            <p>
                                <b>Cruise Line:</b> {{ $cruise->cruise_line }}
                            </p>
                            <p>
                                <b>Ship Name:</b> {{ $cruise->ship_name }}
                            </p>
                        </div>
                        <div id="Itinerary_and_Destinations" class="tab-pane fade">
                            <h4 class="tab-heading"> 132432Departure Port: {{ $cruise->departure }}</h4>
                            <h4>
                                Destination Ports: {{ $cruise->destination }}
                            </h4>
                            <p>
                                <b> Return Port:</b> {{ $cruise->return }}
                            </p>
                            <p>
                                <b>Duration:</b> {{ $cruise->duration }}
                            </p>
                            <p>
                                <b> Day-by-Day Itinerary:</b> {{ $cruise->itinerary }}
                            </p>

                        </div>
                        <div id="Pricing_and_Packages" class="tab-pane fade">
                            <h4 class="tab-heading">ase Price: {{ $cruise->price }}</h4>
                            <p>
                                <b> Package Options:</b> {{ $cruise->package }}
                            </p>
                        </div>
                        <div id="Cabin_and_Accommodation_Details" class="tab-pane fade">
                            <h4 class="tab-heading">Cabin Type: {{ $cruise->cabin_type }}</h4>
                            <p>
                                <b>Description:</b> {{ $cruise->description_details }}
                            </p>
                            <p>
                                <b> Cabin Images:</b>
                            </p>
                            <img src="{{ asset('public/storage/' . $cruise->cabin_images) }}" alt="Cruise" width="100px">
                        </div>
                        <div id="Onboard_Services_and_Amenities" class="tab-pane fade">
                            <h4 class="tab-heading">Included Services:
                                @if ($cruise->amenities > 0)
                                    @foreach (json_decode($cruise->amenities) as $amenities)
                                        {{ ucfirst(strtolower($amenities)) }},
                                    @endforeach
                                @endif
                            </h4>
                            {{-- <p>
                                <b> Optional Services:</b> {{ $cruise->optional }}
                            </p> --}}
                            <p>
                                <b> Entertainment Options:</b> {{ $cruise->entertainment }}
                            </p>
                            <p>
                                <b> Dining Options:</b> {{ $cruise->dining }}
                            </p>
                        </div>
                        <div id="Safety_and_Regulations" class="tab-pane fade">
                            <h4 class="tab-heading">Safety Information: {{ $cruise->safety }}</h4>
                            <p>
                                <b>Age Restrictions:</b> {{ $cruise->age }}
                            </p>
                            <p>
                                <b> Health Requirements:</b> {{ $cruise->health }}
                            </p>
                            <p>
                                <b>Cancellation Policy:</b> {{ $cruise->cancellation_policy }}
                            </p>
                            <p>
                                <b> Terms and Conditions:</b> {{ $cruise->terms_and_conditions }}
                            </p>
                        </div>
                        <div id="Media_Management" class="tab-pane fade">
                            <h4 class="tab-heading"> Cruise Images:</h4>
                            @if ($cruise->images)
                                @php
                                    $images = json_decode($cruise->images);
                                @endphp
                                @if ($images && count($images) > 0)
                                    @foreach ($images as $index => $image)
                                        <img src="{{ asset('public/storage/' . $image) }}" alt="Cruise" width="100px">
                                    @endforeach
                                @endif
                            @endif

                            <h4> Video Highlights:</h4>
                            @if ($cruise->videos)
                                <iframe width="540" height="280"
                                    src="https://www.youtube.com/embed/{{ $cruise->videos }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            @endif
                        </div>

                        {{-- <div class="tab-content">
                            <div id="itinerary" class="tab-pane fade">
                                <h4 class="tab-heading">Package Itinerary</h4>
                                @php
                                $packages = App\Models\Package::where('service_id', $cruise->id)->get();
                                @endphp
                                @foreach ($packages as $package)
                                <div class="daily-schedule">
                                    <div class="title">
                                        <p><span>Day {{ $package->validity }}</span>{{ $package->city }}</p>
                                    </div>
                                    <div class="daily-schedule-body">
                                        <div class="col-md-4 col-sm-4">
                                            <img src="{{ asset('public/storage/') . '/' . $package->image }}" alt="cruise">
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
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div id="cabin" class="tab-pane fade">
                                <h4 class="tab-heading">Cabin Types</h4>
                                <div class="inclusion-wrapper">
                                    <div class="inclusion-title">
                                        <p><span><i class="fa fa-bed"></i></span>Balcony</p>
                                    </div>
                                    <div class="inclusion-body">
                                        <div class="col-md-3 col-sm-3 clear-padding">
                                            <img src="assets/images/tour1.jpg" alt="cruise">
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <h5>Starting From $299/Person <a href="#">BOOK NOW</a></h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                                unknown printer took a galley of type and scrambled it to make a type specimen
                                                book.</p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 activity">
                                            <h4>Cabin Facilities</h4>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> LED TV</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Refrigerator</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Room Sevice</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Free WiFi</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="inclusion-wrapper">
                                    <div class="inclusion-title">
                                        <p><span><i class="fa fa-bed"></i></span>Ocean View</p>
                                    </div>
                                    <div class="inclusion-body">
                                        <div class="col-md-3 col-sm-3 clear-padding">
                                            <img src="assets/images/tour1.jpg" alt="cruise">
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <h5>Starting From $399/Person <a href="#">BOOK NOW</a></h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                                unknown printer took a galley of type and scrambled it to make a type specimen
                                                book.</p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 activity">
                                            <h4>Cabin Facilities</h4>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> LED TV</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Refrigerator</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Room Sevice</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Free WiFi</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="inclusion-wrapper">
                                    <div class="inclusion-title">
                                        <p><span><i class="fa fa-bed"></i></span>Suite</p>
                                    </div>
                                    <div class="inclusion-body">
                                        <div class="col-md-3 col-sm-3 clear-padding">
                                            <img src="assets/images/tour1.jpg" alt="cruise">
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <h5>Starting From $599/Person <a href="#">BOOK NOW</a></h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                                unknown printer took a galley of type and scrambled it to make a type specimen
                                                book.</p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 activity">
                                            <h4>Cabin Facilities</h4>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> LED TV</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Refrigerator</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Room Sevice</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><i class="fa fa-check-square"></i> Free WiFi</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="map" class="tab-pane fade">
                                <h4 class="tab-heading">Map</h4>
                            </div>
                        </div> --}}
                    </div>

                    <hr>
                    <div class="similar-hotel sidebar-item">
                        <h4><i class="fa fa-bed"></i> Similar Cruise</h4>
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
                    <div class="contact sidebar-item">
                        <div class="sidebar-booking-box">
                            <h3 class="text-center">MAKE A BOOKING</h3>
                            <div class="booking-box-body">
                                <form action="{{ route('booking') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $cruise->id }}" name="service_id">
                                    <input type="hidden" value="cruise" name="booking_type">
                                    {{-- <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label>Start</label>
                                    <div class="input-group margin-bottom-sm">
                                        <input type="text" id="check_in" name="start_date" class="form-control"
                                            placeholder="DD/MM/YYYY" required>
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label>End</label>
                                    <div class="input-group margin-bottom-sm">
                                        <input type="text" id="check_out" name="end_date" class="form-control"
                                            placeholder="DD/MM/YYYY" required>
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
                                        <label><input type="checkbox" name="room_type" value="single" id="single"
                                                onchange="toggleCheckbox(this)"><span>Deluxe Single Room</span></label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <h5>$99/Night</h5>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="room-price">
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <label><input type="checkbox" name="room_type" value="double" id="double"
                                                onchange="toggleCheckbox(this)"><span>Deluxe Double Room</span></label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <h5>$199/Night</h5>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="room-price">
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <label><input type="checkbox" name="room_type" value="royal" id="royal"
                                                onchange="toggleCheckbox(this)"><span>Royal Suite</span></label>
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
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                    <div class="assistance-box sidebar-item">
                        <h4><i class="fa fa-phone"></i> Need Assistance</h4>
                        <div class="assitance-body text-center">
                            <h5>Need Help? Call us or drop a message. Our agents will be in touch shortly.</h5>
                            <h2>+91 {{ $cruise->mobile }}</h2>
                            <h3>Or</h3>
                            <a href="mailto:{{ $cruise->email }}"><i class="fa fa-envelope-o"></i> Email Us</a>
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
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
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
