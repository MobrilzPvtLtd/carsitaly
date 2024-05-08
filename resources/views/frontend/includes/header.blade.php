<body class="load-full-screen">

<div id="loader" class="load-full-screen">
	<div class="loading-animation">
		<span><i class="fa fa-plane"></i></span>
		<span><i class="fa fa-bed"></i></span>
		<span><i class="fa fa-ship"></i></span>
		<span><i class="fa fa-suitcase"></i></span>
	</div>
</div>
<!-- END: PRELOADER -->

<!-- BEGIN: COLOR SWITCHER -->
<!-- <div class="cswitcher">
	<div id="color-switcher">
		<h6>CHOOSE COLOR</h6>
		<ul>
			<li class="green" data-path="assets/css/color/green.css"></li>
			<li class="light-green" data-path="assets/css/color/light-green.css"></li>
			<li class="red" data-path="assets/css/dummy.css"></li>
			<li class="blue" data-path="assets/css/color/blue.css"></li>
			<li class="brown" data-path="assets/css/color/brown.css"></li>
			<li class="purple" data-path="assets/css/color/purple.css"></li>
			<li class="orange" data-path="assets/css/color/orange.css"></li>
			<li class="yellow" data-path="assets/css/color/yellow.css"></li>
		</ul>
	</div>
</div>
<span id="stoggle"><i class="fa fa-cog"></i></span> -->
<!-- END: COLOR SWITCHER -->

<!-- BEGIN: SITE-WRAPPER -->
<div class="site-wrapper">
	<div class="row transparent-menu-top">
		<div class="container clear-padding">
			<div class="navbar-contact">
				<div class="col-md-7 col-sm-6 clear-padding">
					<a href="#" class="transition-effect"><i class="fa fa-phone"></i> (+91) 1234567890</a>
					<a href="www.gmail.com" class="transition-effect"><i class="fa fa-envelope-o"></i> support@email.com</a>
				</div>
				<div class="col-md-5 col-sm-6 clear-padding search-box">
					<div class="col-md-6 col-xs-5 clear-padding">
						<form >
							<div class="input-group">
								<input type="text" name="search" class="form-control" required placeholder="Search">
								<span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
							</div>
						</form>
					</div>
					<div class="col-md-6 col-xs-7 clear-padding user-logged">
						@if (Auth::user())
                            <a href="{{ route('backend.dashboard') }}" class="transition-effect">
                                <img class="avatar-img" src="{{ asset(auth()->user()->avatar) }}"
                                    alt="{{ asset(auth()->user()->name) }}">
                                Hello ,{{ Auth::user()->name }}
                            </a>

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>&nbsp;@lang('Logout')
                            </a>
                            <form id="logout-form" style="display: none;" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="transition-effect">
                                <i class="fa fa-sign-in"></i>Login
                            </a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row transparent-menu">
		<div class="container clear-padding">
			<!-- BEGIN: HEADER -->
			<div class="navbar-wrapper">
				<div class="navbar navbar-default" role="navigation">
					<!-- BEGIN: NAV-CONTAINER -->
					<div class="nav-container">
						<div class="navbar-header">
							<!-- BEGIN: TOGGLE BUTTON (RESPONSIVE)-->
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<!-- BEGIN: LOGO -->
							<a class="navbar-brand logo" href="index-4.html">Car Italy and tours</a>
						</div>

						<!-- BEGIN: NAVIGATION -->
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<li><a href="home"> HOME</a></li>
									<li><a href="transfer"> TRANSFERS</a></li>
									<li><a href="hotel"> HOTELS</a></li>
									<li><a href="villa"> VILLAS</a></li>
									<li><a href="tour"> TOURS</a></li>
									<li><a href="air"> AIR FARE</a></li>
									<li><a href="cruise"> CRUISE</a></li>
									<li><a href="contact"> CONTACT</a></li>
									<!-- <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-home"></i> HOME <i class="fa fa-caret-down"></i></a> -->
									<!-- <ul class="dropdown-menu"> -->
										<!-- <li><a href="index.html"> HOME STYLE 1</a></li>
										<li><a href="index-2.html"> HOME STYLE 2</a></li>
										<li><a href="index-3.html"> HOME STYLE 3</a></li> -->
										<!-- <li><a href="index-4.html"> HOME STYLE 4</a></li> -->
										<!-- <li><a href="index-5.html"> HOME STYLE 5</a></li> -->
									<!-- </ul> -->
								</li>
								<!-- <li class="dropdown mega">
									<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-bed"></i> HOTELS <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu mega-menu">
										<li class="col-md-3 col-sm-3 desc">
											<h4>HOTELS</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>PAGES</h5>
											<ul>
												<li><a href="hotel.html">HOTEL SEARCH</a></li>

												<li><a href="hotel-list.html">HOTEL LIST</a></li>
												<li><a href="hotel-grid.html">HOTEL GRID</a></li>
												<li><a href="hotel-booking.html">HOTEL BOOKING</a></li>
												<li><a href="hotel-booking-2.html">HOTEL BOOKING 2</a></li>
												<li><a href="hotel-detailed-3.html">HOTEL DETAILED</a></li>
												<li><a href="hotel-detailed.html">HOTEL DETAILED 2</a></li>
											</ul>
											<h5 class="top-margin">TOP REGION</h5>
											<ul>
												<li><a href="#">ASIA</a></li>
												<li><a href="#">AFRICA</a></li>
												<li><a href="#">EAST ASIA</a></li>
												<li><a href="#">WESTERN EUROPE</a></li>
												<li><a href="#">SOUTH AMERICA</a></li>
												<li><a href="#">LATIN AMERICA</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>TOP REGION</h5>
											<ul>
												<li><a href="#">ASIA</a></li>
												<li><a href="#">AFRICA</a></li>
												<li><a href="#">EAST ASIA</a></li>
												<li><a href="#">WESTERN EUROPE</a></li>
												<li><a href="#">SOUTH AMERICA</a></li>
												<li><a href="#">LATIN AMERICA</a></li>
											</ul>
											<h5 class="top-margin">TOP DESTINATION</h5>
											<ul>
												<li><a href="#">BENGLURU</a></li>
												<li><a href="#">CHENNAI</a></li>
												<li><a href="#">CALIFORNIA</a></li>
												<li><a href="#">GOA</a></li>
												<li><a href="#">NEW YORK</a></li>
												<li><a href="#">NEW DELHI</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<div class="img-div clear-top">
												<img src="assets/images/tour1.jpg" alt="cruise">
												<div class="overlay">
													<h5>20% OFF</h5>
													<p>On Paris HOTELS</p>
													<a href="#">KNOW MORE</a>
												</div>
											</div>
											<div class="img-div">
												<img src="assets/images/tour1.jpg" alt="cruise">
												<div class="overlay">
													<h5>20% OFF</h5>
													<p>On Paris HOTELS</p>
													<a href="#">KNOW MORE</a>
												</div>
											</div>
										</li>
									</ul>
									<div class="clearfix"></div>
								</li>
								<li class="dropdown mega">
									<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-plane"></i> FLIGHTS <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu mega-menu">
										<li class="col-md-3 col-sm-3 desc">
											<h4>FLIGHTS</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>PAGES</h5>
											<ul>
												<li><a href="flight.html">FLIGHT SEARCH</a></li>
												<li><a href="flight-list-2.html">FLIGHT LIST</a></li>
												<li><a href="flight-list.html">FLIGHT LIST 2</a></li>
												<li><a href="flight-booking.html">FLIGHT BOOKING</a></li>
											</ul>
											<div class="img-div">
												<img src="assets/images/tour1.jpg" alt="cruise">
												<div class="overlay">
													<h5>30% OFF</h5>
													<p>On BANGKOK FLIGHTS</p>
													<a href="#">KNOW MORE</a>
												</div>
											</div>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>TOP REGION</h5>
											<ul>
												<li><a href="#">ASIA</a></li>
												<li><a href="#">AFRICA</a></li>
												<li><a href="#">EAST ASIA</a></li>
												<li><a href="#">WESTERN EUROPE</a></li>
											</ul>
											<div class="img-div">
												<img src="assets/images/tour1.jpg" alt="cruise">
												<div class="overlay">
													<h5>10% OFF</h5>
													<p>On DUBAI FLIGHTS</p>
													<a href="#">KNOW MORE</a>
												</div>
											</div>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>CHEAP FLIGHTS TO</h5>
											<ul>
												<li><a href="#">BENGLURU</a></li>
												<li><a href="#">CHENNAI</a></li>
												<li><a href="#">CALIFORNIA</a></li>
												<li><a href="#">GOA</a></li>
											</ul>
											<div class="img-div">
												<img src="assets/images/tour1.jpg" alt="cruise">
												<div class="overlay">
													<h5>20% OFF</h5>
													<p>On Paris Flights</p>
													<a href="#">KNOW MORE</a>
												</div>
											</div>
										</li>
									</ul>
									<div class="clearfix"></div>
								</li>
								<li class="dropdown mega">
									<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-suitcase"></i> TOURS <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu mega-menu">
										<li class="col-md-3 col-sm-3 desc">
											<h4>TOURS</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>PAGES</h5>
											<ul>
												<li><a href="holiday.html">TOUR SEARCH</a></li><li><a href="holidays-list.html">TOUR LIST</a></li>
												<li><a href="holidays-grid.html">TOUR GRID</a></li>
												<li><a href="holidays-grid-2.html">TOUR GRID 2</a></li>
												<li><a href="holiday-detail-2.html">TOUR DETAIL</a></li>
												<li><a href="holiday-detail.html">TOUR DETAIL 2</a></li>
												<li><a href="holiday-booking.html">TOUR BOOKING</a></li>
												<li><a href="holiday-booking-2.html">TOUR BOOKING 2</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>TOP REGION</h5>
											<ul>
												<li><a href="#">ASIA</a></li>
												<li><a href="#">AFRICA</a></li>
												<li><a href="#">EAST ASIA</a></li>
												<li><a href="#">WESTERN EUROPE</a></li>
												<li><a href="#">SOUTH AMERICA</a></li>
												<li><a href="#">LATIN AMERICA</a></li>
												<li><a href="#">ASIA</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<div class="img-div clear-top">
												<img src="assets/images/tour1.jpg" alt="cruise">
												<div class="overlay">
													<h5>DUBAI</h5>
													<p>Starting From $599</p>
													<a href="#">KNOW MORE</a>
												</div>
											</div>
										</li>
									</ul>
									<div class="clearfix"></div>
								</li>
								<li class="dropdown mega">
									<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-taxi"></i> CARS <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu mega-menu">
										<li class="col-md-3 col-sm-3 desc">
											<h4>CARS</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>PAGES</h5>
											<ul>
												<li><a href="car.html">CAR SEARCH</a></li>
												<li><a href="car-grid-3.html">CAR GRID</a></li>
												<li><a href="car-list.html">CAR LIST</a></li>
												<li><a href="car-detailed-2.html">CAR DETAIL</a></li>
												<li><a href="car-detailed.html">CAR DETAIL 2</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>TOP REGION</h5>
											<ul>
												<li><a href="#">ASIA</a></li>
												<li><a href="#">AFRICA</a></li>
												<li><a href="#">EAST ASIA</a></li>
												<li><a href="#">WESTERN EUROPE</a></li>
												<li><a href="#">SOUTH AMERICA</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<div class="img-div clear-top">
												<img src="assets/images/tour1.jpg" alt="cruise">
												<div class="overlay">
													<h5>DUBAI</h5>
													<p>Starting From $599</p>
													<a href="#">KNOW MORE</a>
												</div>
											</div>
										</li>
									</ul>
									<div class="clearfix"></div>
								</li>
								<li class="dropdown mega">
									<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-ship"></i> CRUISE <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu mega-menu">
										<li class="col-md-3 col-sm-3 desc">
											<h4>CRUISES</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>PAGES</h5>
											<ul>
												<li><a href="cruise.html">CRUISE SEARCH</a></li>
												<li><a href="cruise-list.html">CRUISE LIST</a></li>
												<li><a href="cruise-detail-2.html">CRUISE DETAIL</a></li>
												<li><a href="cruise-detail.html">CRUISE DETAIL 2</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>TOP REGION</h5>
											<ul>
												<li><a href="#">ASIA</a></li>
												<li><a href="#">AFRICA</a></li>
												<li><a href="#">EAST ASIA</a></li>
												<li><a href="#">WESTERN EUROPE</a></li>
												<li><a href="#">SOUTH AMERICA</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<div class="img-div clear-top">
												<img src="assets/images/tour1.jpg" alt="cruise">
												<div class="overlay">
													<h5>DUBAI</h5>
													<p>Starting From $599</p>
													<a href="#">KNOW MORE</a>
												</div>
											</div>
										</li>
									</ul>
									<div class="clearfix"></div>
								</li>
								<li class="dropdown mega">
									<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-file"></i> PAGES <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu mega-menu">
										<li class="col-md-3 col-sm-4 links">
											<h5>BLOG PAGES</h5>
											<ul>
												<li><a href="blog-right-sidebar.html">RIGHT SIDEBAR</a></li>
												<li><a href="blog-left-sidebar.html">LEFT SIDEBAR</a></li>
												<li><a href="blog-full-width.html">FULL WIDTH</a></li>
												<li><a href="single-right-sidebar.html">SINGLE RIGHT SIDEBAR</a></li>
												<li><a href="single-left-sidebar.html">SINGLE LEFT SIDEBAR</a></li>
												<li><a href="single-full-width.html">SINGLE FULL WIDTH</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>SPECIAL PAGES</h5>
											<ul>
												<li><a href="coming-soon.html">COMING SOON</a></li>
												<li><a href="404.html">404</a></li>
												<li><a href="404-2.html">404 2</a></li>
												<li><a href="loading.html">LOADING</a></li>
												<li><a href="login.html">LOGIN/REGSITER</a></li>
												<li><a href="elements.html">ELEMENTS</a></li>
												<li><a href="thank-you.html">COMING SOON</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<h5>EXTRA PAGES</h5>
											<ul>
												<li><a href="user-profile.html">USER DASHBOARD</a></li>
												<li><a href="gallery-3column.html">GALLERY 3 COLUMN</a></li>
												<li><a href="gallery-4column.html">GALLERY 4 COLUMN</a></li>
												<li><a href="about-us.html">ABOUT US</a></li>
												<li><a href="contact-us.html">CONTACT US</a></li>
											</ul>
										</li>
										<li class="col-md-3 col-sm-4 links">
											<div class="img-div clear-top">
												<img src="assets/images/tour1.jpg" alt="cruise">
												<div class="overlay">
													<h5>DUBAI</h5>
													<p>Starting From $599</p>
													<a href="#">KNOW MORE</a>
												</div>
											</div>
										</li>
									</ul>
									<div class="clearfix"></div>
								</li> -->
							</ul>
						</div>
						<!-- END: NAVIGATION -->
					</div>
					<!--END: NAV-CONTAINER -->
				</div>
			</div>
			<!-- END: HEADER -->
		</div>
	</div>
