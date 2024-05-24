<div class="container">
    <!-- START: FILTER AREA -->
    <div class="col-md-3 clear-padding">
        <div class="filter-head text-center">
            <h4>{{ $hotels->count() }} Result Found Matching Your Search.</h4>
        </div>
        <div class="filter-area">
            <div class="price-filter filter">
                <h5><i class="fa fa-usd"></i> Price</h5>
                <p>
                    <label></label>
                    <input type="text" id="amount" name="price" value="120" readonly>
                </p>
                <div id="price-range" wire:model.live="searchPrice"></div>
            </div>
            <div class="name-filter filter">
                <h5><i class="fa fa-bed"></i> Hotel Name</h5>
                <div class="input-group margin-bottom-sm">
                    <input wire:model.live="searchTerm" type="text" id="search-bar" name="title" class="form-control" required placeholder="E.g. Italy">
                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                </div>
            </div>
            <div class="star-filter filter">
                <h5><i class="fa fa-star"></i> Star</h5>
                <ul>
                    <li><input type="checkbox" name="star5" value="5" wire:model.live="star5"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                    <li><input type="checkbox" name="star4" value="4" wire:model.live="star4"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                    <li><input type="checkbox" name="star3" value="3" wire:model.live="star3"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                    <li><input type="checkbox" name="star2" value="2" wire:model.live="star2"> <i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                    <li><input type="checkbox" name="star1" value="1" wire:model.live="star1"> <i class="fa fa-star"></i></li>
                </ul>
            </div>
            <div class="location-filter filter">
                <h5><i class="fa fa-map-marker"></i> Location</h5>
                <ul>
                    @foreach ($uniqueLocation as $location)
                        <li>
                            <input type="checkbox" wire:model.live="filterLocation.{{ $location }}" value="{{ $location }}">
                            {{ $location }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="facilities-filter filter">
                <h5><i class="fa fa-list"></i> Hotel Facilities</h5>
                <ul>
                    <li><input type="checkbox" name="wifi" wire:model.live="wifi" value="wifi"> <i class="fa fa-wifi"></i> Wifi</li>
                    <li><input type="checkbox" name="bed" wire:model.live="bed" value="bed"> <i class="fa fa-bed"></i> Bedroom</li>
                    <li><input type="checkbox" name="taxi" wire:model.live="taxi" value="taxi"> <i class="fa fa-taxi"></i> Transportation</li>
                    <li><input type="checkbox" name="beer" wire:model.live="beer" value="beer"> <i class="fa fa-beer"></i> Bar</li>
                    <li><input type="checkbox" name="cutlery" wire:model.live="cutlery" value="cutlery"> <i class="fa fa-cutlery"></i> Restaurant</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: FILTER AREA -->

    <!-- START: INDIVIDUAL LISTING AREA -->
    <div class="col-md-9 hotel-listing">

        <!-- START: SORT AREA -->
        <div class="sort-area col-sm-10">
            <div class="col-md-3 col-sm-3 col-xs-6 sort">
                <select class="selectpicker" id="sortBy" name="sortBy">
                    <option value="">Price</option>
                    <option value="lowest_price">High to Low</option>
                    <option value="highest_price">Low to High</option>
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
                <a class="switchgrid" title="Grid View">
                    <i class="fa fa-th-large"></i>
                </a>
                <a class="switchlist active" title="List View">
                    <i class="fa fa-list"></i>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="switchable col-md-12 clear-padding">
            @foreach ($hotels as $hotel)
                <div  class="hotel-list-view" id="switchable">
                    <div class="wrapper">
                        <div class="col-md-4 col-sm-6 switch-img clear-padding">
                            @if($hotel->image)
                                @php
                                    $images = json_decode($hotel->image);
                                @endphp

                                @if($images && count($images) > 0)
                                    <img src="{{ asset('public/storage/' . $images[0]) }}" alt="cruise">
                                @endif
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-6 hotel-info">
                            <div>
                                <div class="hotel-header">
                                    <h5>{{ $hotel->title }}
                                        <span>
                                            @php
                                                $rating = $hotel->rating;
                                                $maxRating = 5;
                                            @endphp
                                            @for ($i = 1; $i <= $maxRating; $i++)
                                                @if ($i <= $rating)
                                                    <i class="fa fa-star colored"></i>
                                                @else
                                                    <i class="fa fa-star-o colored"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    </h5>
                                    <p>
                                        <i class="fa fa-map-marker"></i>{{ $hotel->city }}
                                        <i class="fa fa-phone"></i>(+91) {{ $hotel->mobile }}
                                    </p>
                                </div>
                                <div class="hotel-facility">
                                    <p>
                                        @if($hotel->facilities > 0)
                                            @foreach (json_decode($hotel->facilities) as $facility)
                                                @if($facility == "wifi")
                                                    <i class="fa fa-wifi" title="Free Wifi"></i>
                                                @elseif ($facility == "bed")
                                                    <i class="fa fa-bed" title="Luxury Bedroom"></i>
                                                @elseif ($facility == "taxi")
                                                    <i class="fa fa-taxi" title="Transportation"></i>
                                                @elseif ($facility == "beer")
                                                    <i class="fa fa-beer" title="Bar"></i>
                                                @elseif ($facility == "cutlery")
                                                    <i class="fa fa-cutlery" title="Restaurant"></i>
                                                @endif
                                            @endforeach
                                        @endif
                                    </p>
                                </div>
                                <div class="hotel-desc">
                                    <p>{{ $hotel->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix visible-sm-block"></div>
                        <div class="col-md-2 rating-price-box text-center clear-padding">
                            <div class="rating-box">
                                <div class="tripadvisor-rating">
                                    <img src="assets/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>
                                </div>
                                <div class="user-rating">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                    <span>128 Guest Reviews.</span>
                                </div>
                            </div>
                            <div class="room-book-box">
                                <div class="price">
                                    <h5>${{ $hotel->price }} Avg/Night</h5>
                                </div>
                                <div class="book">
                                    <a href="{{ route('frontend.hotels.show',$hotel->slug) }}">BOOK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
