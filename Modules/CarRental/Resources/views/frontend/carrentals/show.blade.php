@extends('frontend.layouts.services-app')

@section('title')
    {{ $$module_name_singular->title }} - {{ __($module_title) }}
@endsection

@section('services-content')
<div class="row page-title">
    <div class="container clear-padding text-center">
        <h3>WONDERFUL EUROPE</h3>
    </div>
</div>

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
                    <div class="item active">
                        <img src="assets/images/slide.jpg" alt="Cruise">
                    </div>
                    <div class="item">
                        <img src="assets/images/slide2.jpg" alt="Cruise">
                    </div>
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
                    <li class="active"><a data-toggle="tab" href="#Vehicle-info"> <span>Vehicle Information</span></a></li>
                    <li><a data-toggle="tab" href="#itinerary"> <span> Vehicle Details</span></a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div id="Vehicle-info" class="tab-pane fade in active">
                        <h4 class="tab-heading">VEHICLE NAME: NAME OF THE VEHICLE SERVICE.</h4>
                        <p>
                            <b>Description:</b> Detailed description of the Vehicle service.
                        </p>


                    </div>
                    <div id="itinerary" class="tab-pane fade">
                        <h4 class="tab-heading"> Vehicle Type: Type of vehicle (e.g., sedan, SUV, van).</h4>
                        <p> <b>Vehicle Capacity:</b> Amount of luggage the vehicle can carry.
                        </p>
                        <p> <b>Luggage Capacity:</b> Number of passengers the vehicle can accommodate.
                        </p>
                        <p> <b> Vehicle Features:</b> List of features (e.g., air conditioning, Wi-Fi, child seats).
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 package-detail-sidebar">
            <div class="contact sidebar-item">
                <div class="sidebar-booking-box">
                    <h3 class="text-center">MAKE A BOOKING</h3>
                    <div class="booking-box-body">
                        <form action="http://localhost/booking" method="POST">
                            @csrf
                            <input type="hidden" value="13" name="service_id">
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
                            {{-- @if (!Auth::check())
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
                            @endif --}}
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
            <div class="col-md-12 sidebar-wrapper clear-padding">
                <div class="package-summary sidebar-item">
                    <h4><i class="fa fa-bookmark"></i> Package Summary</h4>
                    <div class="package-summary-body">
                        <h5><i class="fa fa-heart"></i>Theme</h5>
                        <p>Honeymoon, Group, Beach</p>
                        <h5><i class="fa fa-map-marker"></i>Departure Port</h5>
                        <p>Miami</p>
                        <h5><i class="fa fa-globe"></i>Itinerary</h5>
                        <p>Paris, London, Amesterdam</p>
                    </div>
                    <div class="package-summary-footer text-center">
                        <div class="col-md-6 col-sm-6 col-xs-6 price">
                            <h5>Starting From</h5>
                            <h5><strong>$999/Person</strong></h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 book">
                            <a href="#">BOOK NOW</a>
                        </div>
                    </div>
                </div>
                <div class="assistance-box sidebar-item">
                    <h4><i class="fa fa-phone"></i> Need Assistance</h4>
                    <div class="assitance-body text-center">
                        <h5>Need Help? Call us or drop a message. Our agents will be in touch shortly.</h5>
                        <h2>+91 1234567890</h2>
                        <h3>Or</h3>
                        <a href="mailto:info@yourdomain.com"><i class="fa fa-envelope-o"></i> Email Us</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection