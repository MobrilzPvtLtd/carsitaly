@extends('frontend.layouts.app')

@section('title')
    {{ app_name() }}
@endsection

@section('content')
    <!-- BEGIN: SEARCH SECTION -->
    <div class="row vertical-search">
        <div class="container clear-padding">
            <div class="search-section">
                <div role="tabpanel">
                    <div class="col-md-2 col-sm-2 vertical-tab">
                        <!-- BEGIN: CATEGORY TAB -->
                        <ul class="nav nav-tabs search-top" role="tablist" id="searchTab">
                            <li role="presentation" class="active">
                                <a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">
                                    <i class="fa fa-plane"></i>
                                    <span>FLIGHTS</SPAN>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">
                                    <i class="fa fa-bed"></i>
                                    <span>HOTELS</span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#holiday" aria-controls="holiday" role="tab" data-toggle="tab">
                                    <i class="fa fa-suitcase"></i>
                                    <span>TOURS</span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#transfer" aria-controls="taxi" role="tab" data-toggle="tab">
                                    <i class="fa fa-cab"></i>
                                    <span>TRANSFERS</span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#taxi" aria-controls="taxi" role="tab" data-toggle="tab">
                                    <i class="fa fa-cab"></i>
                                    <span>CAR RENTAL</span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#cruise" aria-controls="cruise" role="tab" data-toggle="tab">
                                    <i class="fa fa-ship"></i>
                                    <span>CRUISE</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END: CATEGORY TAB -->
                    </div>

                    <div class="col-md-10 col-sm-10 vertical-tab-pannel">
                        <!-- BEGIN: TAB PANELS -->
                        <div class="tab-content">
                            {{-- @include('flash::alert-message') --}}
                            <!-- BEGIN: FLIGHT SEARCH -->
                            <div role="tabpanel" class="tab-pane active" id="flight">
                                <div class="col-md-12 clear-padding">
                                    <form action="{{route('flight')}}" method="POST">
                                        @csrf
                                        <div class="col-md-12 product-search-title">Book Flight Tickets</div>
                                        <div class="col-md-12 search-col-padding">
                                            <label class="radio-inline">
                                                <input type="checkbox" name="trip_type" id="inlineRadio1" value="One Way" onchange="toggleCheckbox(this)"> One Way
                                            </label>
                                            <label class="radio-inline">
                                                <input type="checkbox" name="trip_type" id="inlineRadio2" value="Round Trip" onchange="toggleCheckbox(this)"> Round Trip
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Leaving From</label>
                                            <div class="input-group">
                                                <input type="text" name="leaving_from" class="form-control" required placeholder="E.g. London">
                                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Leaving To</label>
                                            <div class="input-group">
                                                <input type="text" name="leaving_to" class="form-control" required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Departure</label>
                                            <div class="input-group">
                                                <input type="text" id="departure_date" name="departure_date" class="form-control" placeholder="DD/MM/YYYY">
                                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Return</label>
                                            <div class="input-group">
                                                <input type="text" id="return_date" class="form-control"
                                                    name="return_date" placeholder="DD/MM/YYYY">
                                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-4 col-sm-4 search-col-padding">
                                            <label>Adult</label><br>
                                            <input id="adult_count" name="adult_count" value="1"
                                                class="form-control quantity-padding">
                                        </div>
                                        <div class="col-md-4 col-sm-4 search-col-padding">
                                            <label>Child</label><br>
                                            <input type="text" id="child_count" name="child_count" value="1" class="form-control quantity-padding">
                                        </div>
                                        <div class="col-md-4 col-sm-4 search-col-padding">
                                            <label>Class</label><br>
                                            <select class="selectpicker" name="class">
                                                <option>Business</option>
                                                <option>Economy</option>
                                            </select>
                                        </div>
                                        @if(!Auth::check())
                                            <div class="col-md-4 col-sm-4 search-col-padding">
                                                <label>Name</label>
                                                <input type="text" id="check_in" name="name" class="form-control" placeholder="Enter Your Name">
                                            </div>
                                            <div class="col-md-4 col-sm-4 search-col-padding">
                                                <label>Email</label>
                                                <input type="text" id="check_in" name="email" class="form-control" placeholder="Enter Your Email">
                                            </div>
                                            <div class="col-md-4 col-sm-4 search-col-padding">
                                                <label>Mobile</label>
                                                <input type="number" id="check_in" name="mobile" class="form-control" placeholder="Enter Your Mobile">
                                            </div>
                                        @endif
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 search-col-padding">
                                            <button type="submit" class="search-button btn transition-effect">Submit Flights</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                {{-- <div class="offer-box col-md-4">
                                    <div class="owl-carousel" id="flightoffer">
                                        <div class="item">
                                            <img src="images-new/flight-ticket-availability.jpg" alt="cruise">
                                            <h4>Flights To Italy</h4>
                                            <h5>Starting From $599</h5>
                                            <a href="#">KNOW MORE</a>
                                        </div>
                                        <div id="faltu">
                                            <!-- <img src="assets/images/tour1.jpg" alt="cruise">
                                            <h4>Flights To Paris</h4>
                                            <h5>Starting From $999</h5>
                                            <a href="#">KNOW MORE</a> -->
                                        </div>

                                    </div>
                                </div> --}}
                                <div class="clearfix"></div>
                            </div>
                            <!-- END: FLIGHT SEARCH -->

                            <!-- START: HOTEL SEARCH -->
                            <div role="tabpanel" class="tab-pane" id="hotel">
                                <div class="col-md-12">
                                    <form action="{{ route('frontend.hotels.index') }}" method="GET">
                                        <div class="col-md-12 product-search-title">Book Hotel Rooms</div>
                                        <div class="col-md-12 col-sm-12 search-col-padding">
                                            <label>I Want To Go</label>
                                            <div class="input-group">
                                                <input type="text" name="destination-city" class="form-control"
                                                    required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Check - In</label>
                                            <div class="input-group">
                                                <input type="text" name="check-in" id="check_in"
                                                    class="form-control" placeholder="DD/MM/YYYY">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Check - Out</label>
                                            <div class="input-group">
                                                <input type="text" name="check-out" id="check_out"
                                                    class="form-control" placeholder="DD/MM/YYYY">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-3 col-sm-3 search-col-padding">
                                            <label>Adult</label><br>
                                            <input id="hotel_adult_count" name="adult_count" value="1"
                                                class="form-control quantity-padding">
                                        </div>
                                        <div class="col-md-3 col-sm-3 search-col-padding">
                                            <label>Child</label><br>
                                            <input type="text" id="hotel_child_count" name="child_count"
                                                value="1" class="form-control quantity-padding">
                                        </div>
                                        <div class="col-md-3 col-sm-3 search-col-padding">
                                            <label>Rooms</label><br>
                                            <select class="selectpicker" name="rooms">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 search-col-padding">
                                            <label>Nights</label><br>
                                            <select class="selectpicker" name="nights">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 search-col-padding">
                                            <button type="submit" class="search-button btn transition-effect">Search
                                                Hotels</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                {{-- <div class="offer-box col-md-4">
                                    <div class="item">
                                        <img src="images-new/DSC_0835.jpg" alt="cruise">
                                        <h4>Hotels In Italy</h4>
                                        <h5>Starting From $399/Night</h5>
                                        <a href="#">KNOW MORE</a>
                                    </div>
                                </div> --}}
                                <div class="clearfix"></div>
                            </div>
                            <!-- END: HOTEL SEARCH -->

                            <!-- START: BEGIN HOLIDAY -->
                            <div role="tabpanel" class="tab-pane" id="holiday">
                                <div class="col-md-12">
                                    <form action="{{ route('frontend.tours.index') }}" method="GET">
                                        <div class="col-md-12 product-search-title">Book Your Tour</div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>From</label>
                                            <div class="input-group">
                                                <input type="text" name="pack-departure-city" class="form-control"
                                                    required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>I Want To Go</label>
                                            <div class="input-group">
                                                <input type="text" name="pack-destination-city" class="form-control"
                                                    required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Starting From</label>
                                            <div class="input-group">
                                                <input type="text" id="package_start" class="form-control"
                                                    placeholder="DD/MM/YYYY">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Duration(Optional)</label><br>
                                            <select class="selectpicker" name="holiday_duration">
                                                <option>3 Days</option>
                                                <option>5 Days</option>
                                                <option>1 Week</option>
                                                <option>2 Weeks</option>
                                                <option>1 Month</option>
                                                <option>1+ Month</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Package Type(Optional)</label><br>
                                            <select class="selectpicker" name="package_type">
                                                <option>Group</option>
                                                <option>Family</option>
                                                <option>Individual</option>
                                                <option>Honeymoon</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Budget(Optional)</label><br>
                                            <select class="selectpicker" name="package_budget">
                                                <option>500</option>
                                                <option>1000</option>
                                                <option>1000+</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 search-col-padding">
                                            <button type="submit" class="search-button btn transition-effect">Search
                                                Packages</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                {{-- <div class="offer-box col-md-4">
                                    <div class="item">
                                        <img src="images-new/New-Project11.jpg" alt="cruise">
                                        <h4>SAFARI BLUE</h4>
                                        <h5>Starting From $399/Person</h5>
                                        <a href="#">KNOW MORE</a>
                                    </div>
                                </div> --}}
                                <div class="clearfix"></div>
                            </div>
                            <!-- END: HOLIDAYS -->
                            {{-- transfer start --}}
                            <div role="tabpanel" class="tab-pane" id="transfer">
                                <div class="col-md-12">
                                    <form action="{{ route('frontend.transfers.index') }}" method="GET">
                                        <div class="col-md-12 product-search-title">Book a transfer ride</div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Pick Up Location</label>
                                            <div class="input-group">
                                                <input type="text" name="city" class="form-control" required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Drop Off Location</label>
                                            <div class="input-group">
                                                <input type="text" name="destination-city" class="form-control"
                                                    required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Pick Up Date</label>
                                            <div class="input-group">
                                                <input type="text" id="car_start" class="form-control"
                                                    placeholder="MM/DD/YYYY">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Drop Off Date</label>
                                            <div class="input-group">
                                                <input type="text" id="car_end" class="form-control"
                                                    placeholder="MM/DD/YYYY">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Car Brnad(Optional)</label><br>
                                            <select class="selectpicker" name="brand">
                                                {{-- @foreach (App\Models\Service::where('status', 1)->distinct()->pluck('brand') as $brand)
                                                    <option value="{{ $brand }}">{{ $brand }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Car Type(Optional)</label><br>
                                            <select class="selectpicker" name="car_type">
                                                {{-- @foreach (App\Models\Service::where('status', 1)->distinct()->pluck('car_type'); as $ctype)
                                                    <option>{{ $ctype }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 search-col-padding">
                                            <button type="submit" class="search-button btn transition-effect">Search
                                                Cars</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                {{-- <div class="offer-box col-md-4">
                                    <div class="item">
                                        <img src="images-new/img2311.jpg" alt="cruise">
                                        <h4>BMW</h4>
                                        <h5>Starting From $399/Day</h5>
                                        <a href="#">KNOW MORE</a>
                                    </div>
                                </div> --}}
                                <div class="clearfix"></div>
                            </div>
                            {{-- transfer end --}}

                            <!-- START: CAR SEARCH -->
                            <div role="tabpanel" class="tab-pane" id="taxi">
                                <div class="col-md-12">
                                    <form action="{{ route('frontend.transfers.index') }}" method="GET">
                                        <div class="col-md-12 product-search-title">Search Perfect Car</div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Pick Up Location</label>
                                            <div class="input-group">
                                                <input type="text" name="city" class="form-control" required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Drop Off Location</label>
                                            <div class="input-group">
                                                <input type="text" name="destination-city" class="form-control"
                                                    required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Pick Up Date</label>
                                            <div class="input-group">
                                                <input type="text" id="car_start" class="form-control"
                                                    placeholder="MM/DD/YYYY">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Drop Off Date</label>
                                            <div class="input-group">
                                                <input type="text" id="car_end" class="form-control"
                                                    placeholder="MM/DD/YYYY">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Car Brnad(Optional)</label><br>
                                            <select class="selectpicker" name="brand">
                                                {{-- @foreach (App\Models\Service::where('status', 1)->distinct()->pluck('brand') as $brand)
                                                    <option value="{{ $brand }}">{{ $brand }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Car Type(Optional)</label><br>
                                            <select class="selectpicker" name="car_type">
                                                {{-- @foreach (App\Models\Service::where('status', 1)->distinct()->pluck('car_type'); as $ctype)
                                                    <option>{{ $ctype }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 search-col-padding">
                                            <button type="submit" class="search-button btn transition-effect">Search
                                                Cars</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                {{-- <div class="offer-box col-md-4">
                                    <div class="item">
                                        <img src="images-new/img2311.jpg" alt="cruise">
                                        <h4>BMW</h4>
                                        <h5>Starting From $399/Day</h5>
                                        <a href="#">KNOW MORE</a>
                                    </div>
                                </div> --}}
                                <div class="clearfix"></div>
                            </div>
                            <!-- END: CAR SEARCH -->

                            <!-- START: CRUISE SEARCH -->
                            <div role="tabpanel" class="tab-pane" id="cruise">
                                <div class="col-md-12">
                                    <form action="{{ route('frontend.cruises.index') }}" method="GET">
                                        <div class="col-md-12 product-search-title">Cruise Holidays</div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>From</label>
                                            <div class="input-group">
                                                <input type="text" name="pack-departure-city" class="form-control"
                                                    required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>I Want To Go</label>
                                            <div class="input-group">
                                                <input type="text" name="pack-destination-city" class="form-control"
                                                    required placeholder="E.g. New York">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-map-marker fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Starting From</label>
                                            <div class="input-group">
                                                <input type="text" id="cruise_start" class="form-control"
                                                    placeholder="DD/MM/YYYY">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Duration(Optional)</label><br>
                                            <select class="selectpicker" name="holiday_duration">
                                                <option>3 Days</option>
                                                <option>5 Days</option>
                                                <option>1 Week</option>
                                                <option>2 Weeks</option>
                                                <option>1 Month</option>
                                                <option>1+ Month</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Package Type(Optional)</label><br>
                                            <select class="selectpicker" name="package_type">
                                                <option>Group</option>
                                                <option>Family</option>
                                                <option>Individual</option>
                                                <option>Honeymoon</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 search-col-padding">
                                            <label>Budget(Optional)</label><br>
                                            <select class="selectpicker" name="package_budget">
                                                <option>500</option>
                                                <option>1000</option>
                                                <option>1000+</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 search-col-padding">
                                            <button type="submit" class="search-button btn transition-effect">Search
                                                Cruises</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                {{-- <div class="offer-box col-md-4">
                                    <div class="item">
                                        <img src="images-new/desktop-wallpaper-wonder-of-the-seas-cruise-ship-phone.jpg"
                                            alt="cruise">
                                        <h4>Cruise In Italy</h4>
                                        <h5>Starting From $399/Person</h5>
                                        <a href="#">KNOW MORE</a>
                                    </div>
                                </div> --}}
                                <div class="clearfix"></div>
                            </div>
                            <!-- END: CRUISE SEARCH -->
                        </div>
                        <!-- END: TAB PANE -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- END: SEARCH SECTION -->

    <!-- BEGIN: HOW IT WORK -->
    <section id="how-it-work">
        <div class="row work-row">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Best Airport Car Rental Services Provider</h2>
                    <h4>Car Hire . Transfers . Excursions . Flights . Apartments</h4>
                    <div class="space"></div>
                    <p>
                        With more than 30 years tourism experience, we formed just over 4 years ago Car Italy and tours when
                        we saw the need for a better level of service from tourism services business in Italy. Due to our
                        personalised approach, attention to detail and fair prices, we serve our island’s visitors with
                        pride. Most of our new business is by word of mouth. Each of our customers believes she / he is the
                        only one.

                        Car Hire: our new model vehicles are fully insured and well maintained.

                        All 4+ Day Rentals Include Free: Italy Driving Permit , Map, Child / booster seat; 4GB data for GPS.

                        Transfers: our drivers are trained, looking after your comfort and safety.

                        Tours/Activities: Our guides are professionals, with knowledge and insights, sometimes some secrets,
                        to share.

                        Accommodation: focus only on self service apartments for good value, comfort and a unique
                        experience.

                        Flights: local and regional, with prices direct from the airlines.

                        Managers: available 24/7 for any eventuality, keep standards and ensure quality of service.

                        We cater for all visitors, their budget and their pleasure. Our tours and activities cover all Italy
                        attractions, in a country bestowed with great variety and concentration of wild animals, birds,
                        scenic beauty and culture in such diversity and abundance!

                        Car Italy and tours has a lot of experience in arranging ecotourism and visits/tours to historic
                        sites and game parks of the mainland. Take a safari, from 2 to many days. Come and experience
                        Tanzania’s rural life and visit several historical sites which serve as reminders of the strong
                        Arabic influence. You can also visit Usambara mountains, Pangani historical town, Pare Mountains,
                        Amboni Caves, Mbozi meteorite site, Masaai land and Kondoa Irangi Mountain Paintings.
                    </p>
                </div>
                <div class="work-step">
                    <div class="col-md-4 col-sm-4 first-step text-center">
                        <i class="fa fa-search"></i>
                        <h5>SEARCH</h5>
                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                    </div>
                    <div class="col-md-4 col-sm-4 second-step text-center">
                        <i class="fa fa-heart-o"></i>
                        <h5>SELECT</h5>
                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                    </div>
                    <div class="col-md-4 col-sm-4 third-step text-center">
                        <i class="fa fa-shopping-cart"></i>
                        <h5>BOOK</h5>
                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END: HOW IT WORK -->

    <!-- BEGIN: TOP DESTINATION SECTION -->
    <section id="home-top-destination">
        <div class="row image-background">
            <div class="td-overlay">
                <div class="container">
                    <div class="light-section-title text-center">
                        <h2>WE PROMISE, YOU WILL HAVE THE BEST EXPERIENCE</h2>
                        <h4>Car Italy and tours Italy is Ground Handler in Italy deal with all kind of transfers , Such as
                            pick up service(meet and greet at the Airport or Seaport terminal) Airport transfers, seaport
                            transfers, hotel to hotel destination, Group transfers ,VIP transfers, family transfers..</h4>
                        <div class="space"></div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 on-top clear-padding">
                        <div class="col-md-6 col-sm-6 td-product text-center clear-padding wow slideInUp"
                            data-wow-delay="0.1s">
                            <img src="images-new/img2311.jpg" alt="cruise">
                            <div class="overlay">
                                <div class="wrapper">
                                    <!-- <h5>CAR RENTAL</h5> -->
                                    <h3><span>CAR RENTAL</span></h3>
                                    <p>Excellent car hire facilities with vehicles ranging from saloons to 4WD. Car Italy
                                        and tours Italy uses a very professional system and offers reasonable rates. You can
                                        be met in town or at the airport...</p>
                                    <a href="#">KNOW MORE</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 td-product text-center clear-padding wow slideInUp"
                            data-wow-delay="0.2s">
                            <img src="images-new/banner12311.jpg" alt="cruise">
                            <div class="overlay">
                                <div class="wrapper">
                                    <!-- <h5>BANGKOK</h5> -->
                                    <h3><span>TRANSFERS</span></h3>
                                    <p>Car Italy and tours Italy Tours & Transfers is Ground Handler (Transfers Supplier) in
                                        Italy deal with all kind of transfers, Such as pick up service(meet and greet at the
                                        Airport or Seaport terminal) Airport...</p>
                                    <a href="#">KNOW MORE</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix visible-md-block"></div>
                        <div class="col-md-6 col-sm-6 td-product text-center clear-padding wow slideInUp"
                            data-wow-delay="0.1s">
                            <img src="images-new/New-Project11.jpg" alt="cruise">
                            <div class="overlay">
                                <div class="wrapper">
                                    <!-- <h5>DUBAI</h5> -->
                                    <h3><span>SAFARI BLUE</span></h3>
                                    <p>One of the most popular and unique Day trip in Italy . The Safari Blue is a Full Day
                                        Trip sailing ,snorkeling and wonderful time of Sunbathing on a traditional Dhow...
                                    </p>
                                    <a href="#">KNOW MORE</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 td-product text-center clear-padding wow slideInUp"
                            data-wow-delay="0.2s">
                            <img src="images-new/car411.jpg" alt="cruise">
                            <div class="overlay">
                                <div class="wrapper">
                                    <!-- <h5>AUSTRIA</h5> -->
                                    <h3><span>HISTORIC SITES</span></h3>
                                    <p>Car Italy and tours Italy Tours has a lot of experience in arranging ecotourism and
                                        visits/tours to historic sites and gameparks. Come and experience Tanzania’s rural
                                        life and visit several...</p>
                                    <a href="#">KNOW MORE</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix visible-md-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: TOP DESTINATION SECTION -->

    <!-- BEGIN: RECENT BLOG POST -->
    {{-- <section id="recent-blog">
        <div class="row top-offer">
            <div class="container">
                <div class="section-title text-center">
                    <h2>RECENT BLOG POSTS</h2>
                    <h4>NEWS</h4>
                </div>
                <div class="owl-carousel" id="post-list">
                    @foreach ($posts as $post)
                        <div class="room-grid-view wow slideInUp" data-wow-delay="0.1s">
                            <img src="{{ asset('public/storage/' . $post->image) }}" alt="{{ $post->name }}">
                            <div class="room-info">
                                <div class="post-title">
                                    <h5>{{ $post->name }}</h5>
                                    <p><i class="fa fa-calendar"></i> {{ $post->created_at->format('Y M d') }}</p>
                                </div>
                                <div class="post-desc">
                                    <p>{{ $post->meta_title }}</p>
                                </div>
                                <div class="room-book">
                                    <div class="col-md-8 col-sm-6 col-xs-6 clear-padding post-alt">
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 clear-padding">
                                        <a href="{{ route('frontend.posts.show',$post->slug) }}" class="text-center">MORE</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}

    <!-- START: PRODUCT SECTION-->
    <section>
        <div class="row hot-deals">
            <div class="container clear-padding">
                <div class="section-title text-center">
                    <h2>HOT DEALS</h2>
                    <h4>SAVE MORE</h4>
                </div>
                <div role="tabpanel" class="text-center">
                    <!-- BEGIN: CATEGORY TAB -->
                    <ul class="nav nav-tabs" role="tablist" id="hotDeal">
                        <li role="presentation" class="active text-center">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">
                                <i class="fa fa-bed"></i>
                                <span>HOTELS</SPAN>
                            </a>
                        </li>
                        <li role="presentation" class="text-center">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">
                                <i class="fa fa-suitcase"></i>
                                <span>TOURS</SPAN>
                            </a>
                        </li>
                        <li role="presentation" class="text-center">
                            <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">
                                <i class="fa fa-university"></i>
                                <span>VILLAS</SPAN>
                            </a>
                        </li>
                        <li role="presentation" class="text-center">
                            <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">
                                <i class="fa fa-taxi"></i>
                                <span>TRANSFER</SPAN>
                            </a>
                        </li>
                        <li role="presentation" class="text-center">
                            <a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">
                                <i class="fa fa-ship"></i>
                                <span>CRUISES</SPAN>
                            </a>
                        </li>
                    </ul>
                    <!-- END: CATEGORY TAB -->
                    <div class="clearfix"></div>
                    <!-- BEGIN: TAB PANELS -->
                    <div class="tab-content">
                        <!-- BEGIN: FLIGHT SEARCH -->
                        <div role="tabpanel" class="tab-pane active fade in" id="tab1">
                            <div class="col-md-12 hot-deal-list wow slideInLeft">
                                @foreach ($hotels as $hotel)
                                    <div class="item">
                                        <div class="col-xs-3">
                                            @php
                                                $images = json_decode($hotel->images);
                                            @endphp
                                            @if ($images && count($images) > 0)
                                                <img src="{{ asset('public/storage/' . $images[0]) }}" alt="{{ $hotel->title }}">
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-xs-6">
                                            <h5>{{ $hotel->title }}</h5>
                                            <p class="location"><i class="fa fa-map-marker"></i> {{ $hotel->city }}, {{ $hotel->country }}</p>
                                            <p class="text-sm">{{ $hotel->description }}</p>
                                        </div>
                                        <div class="col-md-2 col-xs-3">
                                            <h4>${{ $hotel->price }}</h4>
                                            <h6>Per Night</h6>
                                            <a href="{{ route('frontend.hotels.show', $hotel->slug) }}">BOOK</a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                            {{-- <div class="col-md-6 hot-deal-grid wow slideInRight">
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>HOTEL NAME</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>HOTEL NAME</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>HOTEL NAME</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>HOTEL NAME</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="col-md-12 hot-deal-list">
                                @foreach ($tours as $tour)
                                    <div class="item">
                                        <div class="col-xs-3">
                                            @php
                                                $images = json_decode($tour->images);
                                            @endphp
                                            @if ($images && count($images) > 0)
                                                <img src="{{ asset('public/storage/' . $images[0]) }}" alt="{{ $tour->title }}">
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-xs-6">
                                            <h5>{{ $tour->title }}</h5>
                                            <p class="location"><i class="fa fa-map-marker"></i> {{ $tour->city }}, {{ $tour->country }}</p>
                                            <p class="text-sm">{{ $tour->description }}</p>
                                        </div>
                                        <div class="col-md-2 col-xs-3">
                                            <h4>${{ $tour->price }}</h4>
                                            <h6>Per Night</h6>
                                            <a href="{{ route('frontend.tours.show', $tour->slug) }}">BOOK</a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                            {{-- <div class="col-md-6 hot-deal-grid">
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Paris Starting From $49/Night</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Bangkok Starting From $69/Night</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Dubai Starting From $99/Night</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Italy Starting From $59/Night</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab3">
                            <div class="col-md-12 hot-deal-list">
                                @foreach ($villas as $villa)
                                    <div class="item">
                                        <div class="col-xs-3">
                                            @php
                                                $images = json_decode($villa->images);
                                            @endphp
                                            @if ($images && count($images) > 0)
                                                <img src="{{ asset('public/storage/' . $images[0]) }}" alt="{{ $villa->title }}">
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-xs-6">
                                            <h5>{{ $villa->title }}</h5>
                                            <p class="location"><i class="fa fa-map-marker"></i> {{ $villa->city }}, {{ $villa->country }}</p>
                                            <p class="text-sm">{{ $villa->description }}</p>
                                        </div>
                                        <div class="col-md-2 col-xs-3">
                                            <h4>${{ $villa->price }}</h4>
                                            <h6>Per Night</h6>
                                            <a href="{{ route('frontend.villas.show', $villa->slug) }}">BOOK</a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                            {{-- <div class="col-md-6 hot-deal-grid">
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>AIRLINE NAME</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>AIRLINE NAME</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>AIRLINE NAME</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>AIRLINE NAME</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab4">
                            <div class="col-md-12 hot-deal-list">
                                @foreach ($transfers as $transfer)
                                    <div class="item">
                                        <div class="col-xs-3">
                                            @php
                                                $images = json_decode($transfer->images);
                                            @endphp
                                            @if ($images && count($images) > 0)
                                                <img src="{{ asset('public/storage/' . $images[0]) }}" alt="{{ $transfer->title }}">
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-xs-6">
                                            <h5>{{ $transfer->title }}</h5>
                                            <p class="location"><i class="fa fa-map-marker"></i> {{ $transfer->city }}, {{ $transfer->country }}</p>
                                            <p class="text-sm">{{ $transfer->description }}</p>
                                        </div>
                                        <div class="col-md-2 col-xs-3">
                                            <h4>${{ $transfer->price }}</h4>
                                            <h6>Per Night</h6>
                                            <a href="{{ route('frontend.transfers.show', $transfer->slug) }}">BOOK</a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                            {{-- <div class="col-md-6 hot-deal-grid">
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Car Name</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Car Name</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Car Name</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Car Name</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab5">
                            <div class="col-md-12 hot-deal-list">
                                @foreach ($cruises as $cruise)
                                    <div class="item">
                                        <div class="col-xs-3">
                                            @php
                                                $images = json_decode($cruise->images);
                                            @endphp
                                            @if ($images && count($images) > 0)
                                                <img src="{{ asset('public/storage/' . $images[0]) }}" alt="{{ $cruise->title }}">
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-xs-6">
                                            <h5>{{ $cruise->title }}</h5>
                                            <p class="location"><i class="fa fa-map-marker"></i> {{ $cruise->city }}, {{ $cruise->country }}</p>
                                            <p class="text-sm">{{ $cruise->description }}</p>
                                        </div>
                                        <div class="col-md-2 col-xs-3">
                                            <h4>${{ $cruise->price }}</h4>
                                            <h6>Per Night</h6>
                                            <a href="{{ route('frontend.cruises.show', $cruise->slug) }}">BOOK</a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                            {{-- <div class="col-md-6 hot-deal-grid">
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Cruise Name</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Cruise Name</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Cruise Name</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 item">
                                    <div class="wrapper">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                        <h5>Cruise Name</h5>
                                        <a href="#">DETAILS</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: PRODUCT SECTION -->

    <!-- START: WHY CHOOSE US SECTION -->
    <section id="why-choose-us">
        <div class="row choose-us-row">
            <div class="container clear-padding">
                <div class="light-section-title text-center">
                    <h2>WHY CHOOSE US?</h2>
                    <h4>REASONS TO TRUST US</h4>
                    <div class="space"></div>
                    <p>
                        Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.<br>
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 wow slideInLeft">
                    <div class="choose-us-item text-center">
                        <div class="choose-icon"><i class="fa fa-suitcase"></i></div>
                        <h4>Handpicked Tour</h4>
                        <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</p>
                        {{-- <a href="#">KNOW MORE</a> --}}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 wow slideInUp">
                    <div class="choose-us-item text-center">
                        <div class="choose-icon"><i class="fa fa-phone"></i></div>
                        <h4>Dedicated Support</h4>
                        <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</p>
                        {{-- <a href="#">KNOW MORE</a> --}}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 wow slideInRight">
                    <div class="choose-us-item text-center">
                        <div class="choose-icon"><i class="fa fa-smile-o"></i></div>
                        <h4>Lowest Price</h4>
                        <p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</p>
                        {{-- <a href="#">KNOW MORE</a> --}}
                    </div>
                </div>
                <!-- contact form starts -->
                <div id="contact001" class="col-md-6 col-sm-6 contact-form">
                    <div class="col-md-12">
                        <h2>DROP A MESSAGE</h2>
                        <h5>Drop Us a Message</h5>
                    </div>
                    <form action="{{ route('contact-submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="source" value="homeForm">
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="name" required class="form-control" placeholder="Your Name">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <input type="email" name="email" required class="form-control" placeholder="Your Email">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <input type="text" name="message_title" required class="form-control"
                                placeholder="Message Title">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="5" id="comment" name="message" placeholder="Your Message"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-default submit-review">SEND YOUR MESSAGE</button>
                        </div>
                    </form>
                </div>
                <!-- contact form ends -->
            </div>
        </div>

    </section>
    <!-- END: WHY CHOOSE US SECTION -->
@endsection
