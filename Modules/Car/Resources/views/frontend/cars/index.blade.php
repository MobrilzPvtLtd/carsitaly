@extends('frontend.layouts.services-app')

@section('title') {{ __($module_title) }} @endsection

@section('services-content')

<div class="site-wrapper">
	<div class="row modify-search modify-car">
		<div class="container clear-padding">
			<form >
				<div class="col-md-3">
					<div class="form-gp">
						<label>Pick Up Location</label>
						<div class="input-group margin-bottom-sm">
							<input type="text" name="city" class="form-control" required placeholder="E.g. London">
							<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="form-gp">
						<label>Pick Up Date</label>
						<div class="input-group margin-bottom-sm">
							<input type="text" id="check_in" name="check_in" class="form-control" placeholder="MM/DD/YYYY">
							<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="form-gp">
						<label>Return Date</label>
						<div class="input-group margin-bottom-sm">
							<input type="text" id="check_out" name="check_out" class="form-control" required placeholder="MM/DD/YYYY">
							<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
						</div>
					</div>
				</div>
				<div class="col-md-1 col-sm-6 col-xs-6">
					<div class="form-gp">
						<label>Type</label>
						<select class="selectpicker">
							<option>Sedan</option>
							<option>Limo</option>
							<option>Coupe</option>
							<option>Hatch</option>
						</select>
					</div>
				</div>
				<div class="col-md-1 col-sm-6 col-xs-6">
					<div class="form-gp">
						<label>Brand</label>
						<select class="selectpicker">
							<option>BMW</option>
							<option>AUDI</option>
							<option>MERCEDES</option>
							<option>HONDA</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="form-gp">
						<button type="submit" class="modify-search-button btn transition-effect">MODIFY SEARCH</button>
					</div>
				</div>
			</form>
		</div>
	</div>

    <div class="row">
        <div class="container">
            <!-- START: FILTER AREA -->
            <div class="col-md-3 clear-padding">
                <div class="filter-head text-center">
                    <h4>25 Result Found Matching Your Search.</h4>
                </div>
                <div class="filter-area">
                    <div class="price-filter filter">
                        <h5><i class="fa fa-usd"></i> Price</h5>
                        <p>
                            <label></label>
                            <input type="text" id="amount" readonly>
                        </p>
                        <div id="price-range"></div>
                    </div>
                    <div class="star-filter filter">
                        <h5><i class="fa fa-dashboard"></i> Transmission</h5>
                        <ul>
                            <li><input type="checkbox"> Automatic</li>
                            <li><input type="checkbox"> Mannual</li>
                            <li><input type="checkbox"> Any</li>
                        </ul>
                    </div>
                    <div class="location-filter filter">
                        <h5><i class="fa fa-certificate"></i> Car Brand</h5>
                        <ul>
                            <li><input type="checkbox"> AUDI</li>
                            <li><input type="checkbox"> BMW</li>
                            <li><input type="checkbox"> HONDA</li>
                            <li><input type="checkbox"> SUZUKI</li>
                            <li><input type="checkbox"> MERCEDES</li>
                            <li><input type="checkbox"> All</li>
                        </ul>
                    </div>
                    <div class="filter">
                        <h5><i class="fa fa-dashboard"></i> Engine</h5>
                        <ul>
                            <li><input type="checkbox"> Gas</li>
                            <li><input type="checkbox"> Diesel</li>
                            <li><input type="checkbox"> Electric</li>
                            <li><input type="checkbox"> Patrol</li>
                            <li><input type="checkbox"> Hybrid</li>
                            <li><input type="checkbox"> All</li>
                        </ul>
                    </div>
                    <div class="facilities-filter filter">
                        <h5><i class="fa fa-cog"></i> Equipments</h5>
                        <ul>
                            <li><input type="checkbox"> Car AC</li>
                            <li><input type="checkbox"> Music System</li>
                            <li><input type="checkbox"> FM Radio</li>
                            <li><input type="checkbox"> Satelite Navigation</li>
                            <li><input type="checkbox"> Power Lock</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END: FILTER AREA -->

            <!-- START: INDIVIDUAL LISTING AREA -->
            <div class="col-md-9 holidays-listing">

                <!-- START: SORT AREA -->
                <div class="sort-area col-sm-10">
                    <div class="col-md-3 col-sm-3 col-xs-6 sort">
                        <select class="selectpicker">
                            <option>Price</option>
                            <option> Low to High</option>
                            <option> High to Low</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 sort">
                        <select class="selectpicker">
                            <option>Star Rating</option>
                            <option> Low to High</option>
                            <option> High to Low</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 sort">
                        <select class="selectpicker">
                            <option>User Rating</option>
                            <option> Low to High</option>
                            <option> High to Low</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 sort">
                        <select class="selectpicker">
                            <option>Name</option>
                            <option> Ascending</option>
                            <option> Descending</option>
                        </select>
                    </div>
                </div>
                <!-- END: SORT AREA -->
                <div class="clearfix visible-xs-block"></div>
                <div class="col-sm-2 view-switcher">
                    <div class="pull-right">
                        <a href="#" title="Grid View">
                            <i class="fa fa-th-large"></i>
                        </a>
                        <a href="car-list.html" title="List View">
                            <i class="fa fa-list"></i>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                @foreach ($cars as $car)
                    <div class="col-md-4 col-sm-6">
                        <div class="holiday-grid-view">
                            <div class="holiday-header-wrapper">
                                <div class="holiday-header">
                                    <div class="holiday-img">
                                        <img src="{{ asset('public/storage/uploads/car/') . '/' . $car->image }}" alt="cruise">
                                    </div>
                                    <div class="holiday-price">
                                        <h4>${{ $car->price }}</h4>
                                        <h5>{{ $car->duration }} Day</h5>
                                    </div>
                                    <div class="holiday-title">
                                        <h3>{{ $car->title }}</h3>
                                        <h5><i class="fa fa-certificate"></i> {{ $car->vehicle }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="holiday-details">
                                <div class="col-md-5 col-sm-4 col-xs-4">
                                    <h5>Top Speed</h5>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-8">
                                    <p>{{ $car->top_speed }} KM/HOUR</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-5 col-sm-4 col-xs-4">
                                    <h5>Transmission</h5>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-8">
                                    <p>{{ $car->transmission }}</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-5 col-sm-4 col-xs-4">
                                    <h5>Travelled</h5>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-8">
                                    <p>{{ $car->mileage }} KM</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-5 col-sm-4 col-xs-4">
                                    <h5>Fuel</h5>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-8">
                                    <p>{{ $car->fuel }}</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-5 col-sm-4 col-xs-4">
                                    <h5>Capacity</h5>
                                </div>
                                <div class="col-md-7 col-sm-8 col-xs-8">
                                    <p>{{ $car->capacity }} Person</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="holiday-footer text-center">
                                <div class="col-md-8 col-sm-8 col-xs-8 view-detail">
                                    <a href="#">VIEW DETAILS</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4 social">
                                    <i class="fa fa-heart-o"></i>
                                    <i class="fa fa-share-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="clearfix"></div>

                <!-- START: PAGINATION -->
                <div class="bottom-pagination">
                    <nav class="pull-right">
                        <ul class="pagination pagination-lg">
                            <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">6 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#" aria-label="Previous"><span aria-hidden="true">&#187;</span></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- END: PAGINATION -->
            </div>
            <!-- END: INDIVIDUAL LISTING AREA -->
        </div>
    </div>
</div>

{{-- <section class="bg-white text-gray-600 p-6 sm:p-20">
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
        @foreach ($$module_name as $$module_name_singular)
        @php
        $details_url = route("frontend.$module_name.show",[encode_id($$module_name_singular->id), $$module_name_singular->slug]);
        @endphp

        <x-frontend.card :url="$details_url" :name="$$module_name_singular->name">
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{$$module_name_singular->description}}
            </p>
        </x-frontend.card>

        @endforeach
    </div>
    <div class="d-flex justify-content-center w-100 mt-3">
        {{$$module_name->links()}}
    </div>
</section> --}}

@endsection
