<div class="row">
    <div class="modify-search modify-hotel">
        <div class="container clear-padding">
            @if ($serviceType == 'tours')
                <form wire:submit.prevent="applyFilter">
                    <div class="col-md-3 col-sm-6">
                        <div class="form-gp">
                            <label>Starting From</label>
                            <div class="input-group margin-bottom-sm">
                                <input type="text" name="departure_city" class="form-control" required placeholder="E.g. London">
                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-gp">
                            <label>Going To</label>
                            <div class="input-group margin-bottom-sm">
                                <input type="text" name="destination_city" class="form-control" required placeholder="E.g. Paris">
                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-gp">
                            <label>Month Of Travel</label>
                            <select class="selectpicker">
                                <option>Any</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>December</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-gp">
                            <label>Budget</label>
                            <select class="selectpicker">
                                <option>All</option>
                                <option>Upto $500</option>
                                <option>Above $1000+</option>
                                <option>Upto $5000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-9">
                        <div class="form-gp">
                            <button type="submit" class="modify-search-button btn transition-effect text-center">MODIFY SEARCH</button>
                        </div>
                    </div>
                </form>
            @else
                <form wire:submit.prevent="applyFilter">
                    <div class="col-md-4">
                        <div class="form-gp">
                            <label>Location</label>
                            <div class="input-group margin-bottom-sm">
                                <input type="text" wire:model="city" name="city" class="form-control" required placeholder="E.g. Italy" id="city">
                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-gp">
                            <label>Check In</label>
                            <div class="input-group margin-bottom-sm">
                                <input type="text" id="check_in" name="check_id" wire:model="check_in" class="form-control" placeholder="DD/MM/YYYY">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-gp">
                            <label>Check Out</label>
                            <div class="input-group margin-bottom-sm">
                                <input type="text" id="check_out" name="check_out" wire:model="check_out" class="form-control" placeholder="DD/MM/YYYY">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-3">
                        <div class="form-gp">
                            <label>Rooms</label>
                            <select class="custom-select-room" name="room_types" wire:model="room_types">
                                <option value="">No</option>
                                <option value="single">Single</option>
                                <option value="double">Double</option>
                                <option value="suite">Suite</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-9">
                        <div class="form-gp">
                            <button type="submit" class="modify-search-button btn transition-effect">MODIFY SEARCH</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="col-md-3 clear-padding">
            <div class="filter-head text-center">
                <h4>{{ $services->count() }} Result Found Matching Your Search.</h4>
            </div>
            <div class="filter-area">
                <div class="price-filter filter">
                    <h5><i class="fa fa-usd"></i> Price</h5>
                    <p>
                        <label></label>
                        <input type="text" id="amount" name="price" value="120">
                    </p>
                    <div wire:ignore>
                        <div id="price-range"></div>
                        <button id="update-search-price-btn" wire:click="updateSearchPrice($event.target.value)" style="display: none;"></button>
                    </div>
                </div>
                <div class="name-filter filter">
                    <h5><i class="fa fa-bed"></i> {{ ucfirst(strtolower($serviceType)) }} Name</h5>
                    <div class="input-group margin-bottom-sm">
                        <input wire:model.live="searchTerm" type="text" id="search-bar" name="title" class="form-control" required placeholder="E.g. Italy">
                        <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                    </div>
                </div>
                @if($serviceType != 'tours')
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
                @endif

                @if($serviceType == 'hotels')
                    <div class="star-filter filter">
                        <h5><i class="fa fa-bed"></i> Room Types</h5>
                        <ul>
                            <li><input type="checkbox" wire:model.live="single"> <i class=""></i> Single</li>
                                <li><input type="checkbox" wire:model.live="double"> <i class=""></i> Double</li>
                                <li><input type="checkbox" wire:model.live="suite"> <i class=""></i> Suite</li>
                        </ul>
                    </div>
                @endif

                @if($serviceType == 'villas')
                    <div class="star-filter filter">
                        <h5><i class="fa fa-bed"></i> Bedrooms</h5>
                        <ul>
                            @foreach (App\Models\Service::where('service_type', 'villas')->get() as $bedrooms)
                                <li>
                                    <input type="checkbox" wire:model.live="filterLocation.{{ $bedrooms }}" value="{{ $bedrooms->number_of_bedrooms }}">
                                    {{ $bedrooms->number_of_bedrooms }} Bedrooms
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="star-filter filter">
                        <h5><i class="fa fa-users"></i> Maximum Occupancy</h5>
                        <ul>
                            @foreach (App\Models\Service::where('service_type', 'villas')->get() as $bedrooms)
                                <li>
                                    <input type="checkbox" wire:model.live="filterLocation.{{ $bedrooms }}" value="{{ $bedrooms->maximum_occupancy }}">
                                    {{ $bedrooms->maximum_occupancy }} People
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($serviceType == 'tours')
                    <div class="star-filter filter">
                        <h5><i class="fa fa-clock-o"></i>  Total Duration of the tour
                        </h5>
                        <ul>
                            @foreach (App\Models\Service::where('service_type', 'tours')->get() as $duration)
                                <li>
                                    <input type="checkbox" wire:model.live="filterLocation.{{ $duration }}" value="{{ $duration->duration }}">
                                    {{ $duration->duration }} Hours
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="star-filter filter">
                        <h5><i class="fa fa-clock-o"></i>  Start Time</h5>
                        <ul>
                            <li><input type="checkbox" wire:model.live="single"> <i class=""></i> 4:00</li>
                                <li><input type="checkbox" wire:model.live="Double"> <i class=""></i> 5:00</li>
                                <li><input type="checkbox" wire:model.live="suite"> <i class=""></i> 6:00</li>
                        </ul>
                    </div>
                    <div class="star-filter filter">
                        <h5><i class="fa fa-map-marker"></i>Pickup Point</h5>
                        <ul>
                            <li><input type="checkbox" wire:model.live="single"> <i class=""></i> Gurgaon</li>
                                <li><input type="checkbox" wire:model.live="Double"> <i class=""></i> Noida</li>
                                <li><input type="checkbox" wire:model.live="suite"> <i class=""></i> Delhi</li>
                        </ul>
                    </div>
                @endif
                <div class="facilities-filter filter">
                    <h5><i class="fa fa-list"></i> {{ ucfirst(strtolower($serviceType)) }}  Amenities</h5>
                    <ul>
                        @foreach ($uniqueAmenities as $amenity)
                            <li>
                                <input type="checkbox" wire:model.live="filterAmenities.{{ $amenity->name }}" value="{{ $amenity->name }}"><img src="{{ asset('public/storage/' . $amenity->icon) }}" alt="hotel" width="18px" style="filter: invert(1);"> &nbsp;
                                {{ $amenity->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9 hotel-listing">
            <div class="sort-area col-sm-10">
                <div class="col-md-3 col-sm-3 col-xs-6 sort">
                    <select class="custom-select-button" wire:change="updateSortPrice($event.target.value)">
                        <option value="">Price</option>
                        <option value="lowest_price">Low to High</option>
                        <option value="highest_price">High to Low</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 sort">
                    <select class="custom-select-button" wire:change="updateSortPrice($event.target.value)">
                        <option value="">Star Rating</option>
                        <option value="lowest_rating"> Low to High</option>
                        <option value="highest_rating"> High to Low</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 sort">
                    <select class="custom-select-button" wire:change="updateSortPrice($event.target.value)">
                        <option value="">User Rating</option>
                        <option value="lowest_user_rating"> Low to High</option>
                        <option value="highest_user_rating"> High to Low</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 sort">
                    <select class="custom-select-button" wire:change="updateSortPrice($event.target.value)">
                        <option value="">Name</option>
                        <option value="ascending"> Ascending</option>
                        <option value="descending"> Descending</option>
                    </select>
                </div>
            </div>
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
                @if(count($services) > 0)
                    @foreach ($services as $ser)
                        <div  class="hotel-list-view" id="switchable">
                            <div class="wrapper">
                                <div class="col-md-4 col-sm-6 switch-img clear-padding">
                                    @if($ser->images)
                                        @php
                                            $images = json_decode($ser->images);
                                        @endphp

                                        @if($images && count($images) > 0)
                                        <a href="{{ route('frontend.' . $serviceType . '.show', $ser->slug) }}">
                                            <img src="{{ asset('public/storage/' . $images[0]) }}" alt="cruise">
                                        </a>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-6 hotel-info">
                                    <div>
                                        <div class="hotel-header">
                                            <a href="{{ route('frontend.' . $serviceType . '.show', $ser->slug) }}">
                                                <h5>{{ $ser->title }}
                                                    <span>
                                                        @php
                                                            $rating = $ser->rating;
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
                                            </a>
                                            {{-- <p>
                                                <i class="fa fa-map-marker"></i>{{ $ser->city }}
                                                <i class="fa fa-phone"></i>(+91) {{ $ser->mobile }}
                                                <i class="fa fa-phone"></i>(+91) {{ $ser->mobile }}
                                                <i class="fa fa-phone"></i>(+91) {{ $ser->mobile }}
                                            </p> --}}
                                            @if($ser->service_type == 'tours')
                                                <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                                    <p><i class="fa fa-clock-o"></i>Start Time</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                                    <p><i class="fa fa-clock-o"></i>Total Duration</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                                    <p><i class="fa fa-map-marker"></i>Location</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                                    <p><i class="fa fa-list"></i>Amenities</p>
                                                </div>
                                            @else
                                                <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                                    <p><i class="fa fa-users"></i>{{ $ser->room_types }}</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                                    <p><i class="fa fa-map-marker"></i> {{ $ser->city }}</p>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 clear-padding">
                                                    @foreach (json_decode($ser->amenities) as $amenityName)
                                                        @php
                                                            $amenityDetails = $uniqueAmenities[$amenityName];
                                                        @endphp

                                                        <img src="{{ asset('public/storage/' . $amenityDetails->icon) }}" alt="hotel" width="50px" style="min-height: 50px !important;">{{ $amenityDetails->name }}
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                        {{-- <div class="hotel-facility">
                                            <p>
                                                @if($ser->facilities > 0)
                                                    @foreach (json_decode($ser->facilities) as $facility)
                                                    @if($ser->service_type == 'tours')
                                                        @if($facility == "flight")
                                                            <i class="fa fa-plane" title="Free Flight"></i>
                                                        @elseif ($facility == "car")
                                                            <i class="fa fa-taxi" title="Transportation"></i>
                                                        @elseif ($facility == "sightseeing")
                                                            <i class="fa fa-eye" title="Sightseeing"></i>
                                                        @elseif ($facility == "meals")
                                                            <i class="fa fa-cutlery" title="Meals"></i>
                                                        @elseif ($facility == "drinks")
                                                            <i class="fa fa-glass" title="Drinks"></i>
                                                        @endif
                                                    @else
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
                                                    @endif
                                                    @endforeach
                                                @endif
                                            </p>
                                        </div> --}}
                                        <div class="hotel-desc">
                                            <p>{{ $ser->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix visible-sm-block"></div>
                                <div class="col-md-2 rating-price-box text-center clear-padding">
                                    {{-- <div class="rating-box">
                                        <div class="tripadvisor-rating">
                                            <img src="assets/images/tripadvisor.png" alt="cruise"><span>4.5/5.0</span>
                                        </div>
                                        <div class="user-rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                            <span>128 Guest Reviews.</span>
                                        </div>
                                    </div> --}}
                                    <div class="room-book-box">
                                        <div class="price">
                                            <h5>${{ $ser->price }} Avg/Night</h5>
                                        </div>
                                        <div class="book">
                                            <a href="{{ route('frontend.' . $serviceType . '.show', $ser->slug) }}">BOOK</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="text-center" style="margin-top: 100px">No data available</h4>
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="bottom-pagination">
                {{ $services->links('livewire.pagination-livewire') }}
            </div>
        </div>
    </div>
</div>
