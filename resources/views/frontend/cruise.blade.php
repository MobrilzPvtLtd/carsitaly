@extends('frontend.layouts.services-app')

@section('title')
    {{ app_name() }}
@endsection
@section('services-content')
<div class="site-wrapper">
    <section>
        <div class="row cruise-search single-search">
            <div class="container clear-padding">
                <div class="col-md-12 clear-padding search-section">
                    <h2 class="text-center">FIND YOUR PERFECT CRUISE</h2>
                    <!-- START: HOTEL SEARCH -->
                        <div role="tabpanel" class="tab-pane" id="hotel">
                            <form >
                                <div class="col-md-3 col-sm-3 search-col-padding">
                                    <label>Leaving From</label>
                                    <div class="input-group">
                                        <input type="text" name="dep-city" class="form-control" required placeholder="E.g. New York">
                                        <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 search-col-padding">
                                    <label>Leaving To</label>
                                    <div class="input-group">
                                        <input type="text" name="des-city" class="form-control" required placeholder="E.g. London">
                                        <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 search-col-padding">
                                    <label>Starting From</label>
                                    <div class="input-group">
                                        <input type="text" name="dep_date" id="departure_date" class="form-control" placeholder="MM/DD/YYYY">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 search-col-padding">
                                    <label>Duration</label><br>
                                    <select class="selectpicker" name="guests">
                                        <option>1 Days</option>
                                        <option>2 Days</option>
                                        <option>3 Days</option>
                                        <option>4 Days</option>
                                        <option>5 Days</option>
                                        <option>6 Days</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-2 search-col-padding">
                                    <label>Package Type</label><br>
                                    <select class="selectpicker" name="guests">
                                        <option>Adventure</option>
                                        <option>Group</option>
                                        <option>Beach</option>
                                        <option>Individual</option>
                                        <option>Family</option>
                                        <option>Hiking</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 text-center search-col-padding">
                                    <button type="submit" class="search-button btn transition-effect">Search Cruises</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <!-- END: HOTEL SEARCH -->
                    </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row last-minute-deal">
            <div class="container">
                <div class="section-title text-center">
                    <h2>LAST MINUTE DEALS</h2>
                    <h4>SAVE MORE</h4>
                </div>
                <div class="owl-carousel" id="lastminute">
                    @foreach ($cruises as $cruise)
                        <div class="col-grid">
                            <div class="wrapper">
                                <img src="{{ asset('public/storage/uploads/cruise/') . '/' . $cruise->image }}" alt="cruise">
                                <h5 class="location">{{ $cruise->location }}</h5>
                            </div>
                            <div class="body text-center">
                                <h5>{{ $cruise->title }}</h5>
                                <p>
                                    @for ($i = 0; $i < $cruise->rating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </p>
                                <p class="back-line">Starting From</p>
                                <h3>${{ $cruise->price }}</h3>

                                <p class="text-sm">
                                    <?php echo date('d/M/Y', strtotime($cruise->start_date)) . ' - ' . date('d/M/Y', strtotime($cruise->end_date)); ?>
                                </p>
                            </div>
                            <div class="bottom">
                                <a href="#">VIEW DETAIL</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="top-cruise-row">
        <div class="row top-cruise">
            <div class="container">
                <div class="section-title text-center">
                    <h2>TOP DESTINATION</h2>
                    <h4>CHECK OUT CRUISES IN TOP DESTINATIONS</h4>
                </div>
                {{-- @foreach ($cars as $car)
                    <div class="col-md-4 col-sm-6 tour-grid clear-padding">
                        <img src="{{ asset('public/storage/uploads/car/') . '/' . $car->image }}" alt="Cruise">
                        <div class="tour-brief">
                            <div class="pull-left">
                                <h4><i class="fa fa-map-marker"></i>FRANCE</h4>
                            </div>
                            <div class="pull-right">
                                <h4>$49/Day</h4>
                            </div>
                        </div>
                        <div class="tour-detail text-center">
                            <p><strong><i class="fa fa-car"></i>25 Cars</strong></p>
                            <p><strong>Starting $49/Day</strong></p>
                            <p><a href="#">DETAIL</a></p>
                        </div>
                    </div>
                @endforeach --}}
                <div class="col-md-4 col-sm-6 tour-grid clear-padding">
                    <img src="assets/images/tour1.jpg" alt="Cruise">
                    <div class="tour-brief">
                        <div class="pull-left">
                            <h4><i class="fa fa-map-marker"></i>DUBAI</h4>
                        </div>
                        <div class="pull-right">
                            <h4>$99/Day</h4>
                        </div>
                    </div>
                    <div class="tour-detail text-center">
                        <p><strong><i class="fa fa-car"></i>40 Cars</strong></p>
                        <p><strong>Starting $99/Day</strong></p>
                        <p><a href="#">DETAIL</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 tour-grid clear-padding">
                    <img src="assets/images/tour1.jpg" alt="Cruise">
                    <div class="tour-brief">
                        <div class="pull-left">
                            <h4><i class="fa fa-map-marker"></i>BANGKOK</h4>
                        </div>
                        <div class="pull-right">
                            <h4>$69/Day</h4>
                        </div>
                    </div>
                    <div class="tour-detail text-center">
                        <p><strong><i class="fa fa-car"></i>90 Cars</strong></p>
                        <p><strong>Starting $69/Day</strong></p>
                        <p><a href="#">DETAIL</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 tour-grid clear-padding">
                    <img src="assets/images/tour1.jpg" alt="Cruise">
                    <div class="tour-brief">
                        <div class="pull-left">
                            <h4><i class="fa fa-map-marker"></i>AFRICA</h4>
                        </div>
                        <div class="pull-right">
                            <h4>$90/Day</h4>
                        </div>
                    </div>
                    <div class="tour-detail text-center">
                        <p><strong><i class="fa fa-car"></i>6 Cars</strong></p>
                        <p><strong>Starting $90/Day</strong></p>
                        <p><a href="#">DETAIL</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 tour-grid clear-padding">
                    <img src="assets/images/tour1.jpg" alt="Cruise">
                    <div class="tour-brief">
                        <div class="pull-left">
                            <h4><i class="fa fa-map-marker"></i>BELGIUM</h4>
                        </div>
                        <div class="pull-right">
                            <h4>$89/Day</h4>
                        </div>
                    </div>
                    <div class="tour-detail text-center">
                        <p><strong><i class="fa fa-car"></i>8 Cars</strong></p>
                        <p><strong>Starting $89/Day</strong></p>
                        <p><a href="#">DETAIL</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 tour-grid clear-padding">
                    <img src="assets/images/tour1.jpg" alt="Cruise">
                    <div class="tour-brief">
                        <div class="pull-left">
                            <h4><i class="fa fa-map-marker"></i>AUSTRIA</h4>
                        </div>
                        <div class="pull-right">
                            <h4>$199/Day</h4>
                        </div>
                    </div>
                    <div class="tour-detail text-center">
                        <p><strong><i class="fa fa-car"></i>28 Cars</strong></p>
                        <p><strong>Starting $199/Day</strong></p>
                        <p><a href="#">DETAIL</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                <i class="fa fa-map-marker"></i>
                                <span>NEW YORK</SPAN>
                            </a>
                        </li>
                        <li role="presentation" class="text-center">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">
                                <i class="fa fa-map-marker"></i>
                                <span>SEATLE</SPAN>
                            </a>
                        </li>
                        <li role="presentation" class="text-center">
                            <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">
                                <i class="fa fa-map-marker"></i>
                                <span>CALIFORNIA</SPAN>
                            </a>
                        </li>
                        <li role="presentation" class="text-center">
                            <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">
                                <i class="fa fa-map-marker"></i>
                                <span>LOS VAGAS</SPAN>
                            </a>
                        </li>
                        <li role="presentation" class="text-center">
                            <a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">
                                <i class="fa fa-map-marker"></i>
                                <span>LOS ANGELES</SPAN>
                            </a>
                        </li>
                    </ul>
                    <!-- END: CATEGORY TAB -->
                    <div class="clearfix"></div>
                    <!-- BEGIN: TAB PANELS -->
                    <div class="tab-content">
                        <!-- BEGIN: FLIGHT SEARCH -->
                        <div role="tabpanel" class="tab-pane active fade in" id="tab1">
                            <div class="col-md-6 hot-deal-list">
                                <div class="item">
                                    <div class="col-xs-3">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                    </div>
                                    <div class="col-md-7 col-xs-6">
                                        <h5>Hotel Grand Lilly</h5>
                                        <p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
                                        <p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                    <div class="col-md-2 col-xs-3">
                                        <h4>$499</h4>
                                        <h6>Per Night</h6>
                                        <a href="#">BOOK</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="item">
                                    <div class="col-xs-3">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                    </div>
                                    <div class="col-md-7 col-xs-6">
                                        <h5>Royal Resort</h5>
                                        <p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
                                        <p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                    <div class="col-md-2 col-xs-3">
                                        <h4>$399</h4>
                                        <h6>Per Night</h6>
                                        <a href="#">BOOK</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="item">
                                    <div class="col-xs-3">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                    </div>
                                    <div class="col-md-7 col-xs-6">
                                        <h5>Hotel Grand Lilly</h5>
                                        <p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
                                        <p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                    <div class="col-md-2 col-xs-3">
                                        <h4>$499</h4>
                                        <h6>Per Night</h6>
                                        <a href="#">BOOK</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6 hot-deal-grid">
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
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="col-md-6 hot-deal-list">
                                <div class="item">
                                    <div class="col-xs-3">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                    </div>
                                    <div class="col-md-7 col-xs-6">
                                        <h5>Hotel Grand Lilly</h5>
                                        <p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
                                        <p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                    <div class="col-md-2 col-xs-3">
                                        <h4>$499</h4>
                                        <h6>Per Night</h6>
                                        <a href="#">BOOK</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="item">
                                    <div class="col-xs-3">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                    </div>
                                    <div class="col-md-7 col-xs-6">
                                        <h5>Royal Resort</h5>
                                        <p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
                                        <p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                    <div class="col-md-2 col-xs-3">
                                        <h4>$399</h4>
                                        <h6>Per Night</h6>
                                        <a href="#">BOOK</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="item">
                                    <div class="col-xs-3">
                                        <img src="assets/images/tour1.jpg" alt="Cruise">
                                    </div>
                                    <div class="col-md-7 col-xs-6">
                                        <h5>Hotel Grand Lilly</h5>
                                        <p class="location"><i class="fa fa-map-marker"></i> New York, USA</p>
                                        <p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                    <div class="col-md-2 col-xs-3">
                                        <h4>$499</h4>
                                        <h6>Per Night</h6>
                                        <a href="#">BOOK</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6 hot-deal-grid">
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
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab3">
                            Lorem Lpsum 3
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab4">
                            Lorem Lpsum 4
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab5">
                            Lorem Lpsum 5
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
