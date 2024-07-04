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
                    <li class="active"><a data-toggle="tab" href="#ship-info"><i class="fa fa-ship"></i> <span>Ship Info</span></a></li>
                    <li><a data-toggle="tab" href="#itinerary"><i class="fa fa-globe"></i> <span>Itinerary</span></a>
                    </li>
                    <li><a data-toggle="tab" href="#cabin"><i class="fa fa-check-square"></i> <span>Cabin Types</span></a></li>
                    <li><a data-toggle="tab" href="#map"><i class="fa fa-map-marker"></i> <span>View Map</span></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="ship-info" class="tab-pane fade in active">
                        <h4 class="tab-heading">Overview</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>
                        <h4 class="tab-heading">Facilities</h4>
                        <div class="ammenties-4">
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-beer"></i> Bar</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-cutlery"></i> Restaurant</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-glass"></i> Cafe</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-film"></i> Theatre</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-paw"></i> Pet Room</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-desktop"></i> LED in Room</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-beer"></i> Bar</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-cutlery"></i> Restaurant</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-glass"></i> Cafe</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-film"></i> Theatre</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-paw"></i> Pet Room</p>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <p><i class="fa fa-desktop"></i> LED in Room</p>
                            </div>
                        </div>
                        <h4 class="tab-heading">Lorem Lpsum</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div id="itinerary" class="tab-pane fade">
                        <h4 class="tab-heading">Package Itinerary</h4>
                        <div class="daily-schedule">
                            <div class="title">
                                <p><span>Day 1</span>Paris</p>
                            </div>
                            <div class="daily-schedule-body">
                                <div class="col-md-4 col-sm-4">
                                    <img src="assets/images/tour1.jpg" alt="cruise">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged.</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 activity">
                                    <h4>Included</h4>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Free meal</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Movie show</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Rock concert</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Night show</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="daily-schedule">
                            <div class="title">
                                <p><span>Day 2</span>At Sea</p>
                            </div>
                            <div class="daily-schedule-body">
                                <div class="col-md-4 col-sm-4">
                                    <img src="assets/images/tour1.jpg" alt="cruise">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged.</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 activity">
                                    <h4>Included</h4>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Free meal</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Movie show</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Rock concert</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Night show</p>
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
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged.</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 activity">
                                    <h4>Included</h4>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Free meal</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Movie show</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Rock concert</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><i class="fa fa-check-square"></i> Night show</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
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
                </div>
            </div>
        </div>
        <div class="col-md-4 package-detail-sidebar">
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
                                    <select class="selectpicker bs-select-hidden" name="travel">
                                        <option>By flight</option>
                                        <option>By train</option>
                                        <option>By bus</option>
                                    </select>
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
            </div>
        </div>
    </div>
</div>

@endsection
