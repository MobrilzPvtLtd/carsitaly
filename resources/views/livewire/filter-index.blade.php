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
                                <input type="text" wire:model="city" name="city" class="form-control" required placeholder="E.g. Italy">
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
                            <select class="custom-select-room" name="room_no" wire:model="room_no">
                                <option value="">No</option>
                                @if ($uniqueRoomNumbers)
                                    @foreach ($uniqueRoomNumbers as $roomNumber)
                                        <option>{{ $roomNumber }}</option>
                                    @endforeach
                                @endif
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
                    @if($serviceType == 'tours')
                        <h5><i class="fa fa-list"></i> Inclusion</h5>
                        <ul>
                            <li><input type="checkbox" wire:model.live="flight"> <i class="fa fa-plane"></i> Flight</li>
                            <li><input type="checkbox" wire:model.live="car"> <i class="fa fa-taxi"></i> Transportation</li>
                            <li><input type="checkbox" wire:model.live="sightseeing"> <i class="fa fa-eye"></i> Sightseeing</li>
                            <li><input type="checkbox" wire:model.live="meals"> <i class="fa fa-cutlery"></i> Meals</li>
                            <li><input type="checkbox" wire:model.live="drinks"> <i class="fa fa-glass"></i> Drinks</li>
                        </ul>
                    @else
                        <h5><i class="fa fa-list"></i> {{ ucfirst(strtolower($serviceType)) }} Facilities</h5>
                        <ul>
                            <li><input type="checkbox" name="wifi" wire:model.live="wifi" value="wifi"> <i class="fa fa-wifi"></i> Wifi</li>
                            <li><input type="checkbox" name="bed" wire:model.live="bed" value="bed"> <i class="fa fa-bed"></i> Bedroom</li>
                            <li><input type="checkbox" name="taxi" wire:model.live="taxi" value="taxi"> <i class="fa fa-taxi"></i> Transportation</li>
                            <li><input type="checkbox" name="beer" wire:model.live="beer" value="beer"> <i class="fa fa-beer"></i> Bar</li>
                            <li><input type="checkbox" name="cutlery" wire:model.live="cutlery" value="cutlery"> <i class="fa fa-cutlery"></i> Restaurant</li>
                        </ul>
                    @endif
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
                                    @if($ser->image)
                                        @php
                                            $images = json_decode($ser->image);
                                        @endphp

                                        @if($images && count($images) > 0)
                                            <img src="{{ asset('public/storage/' . $images[0]) }}" alt="cruise">
                                        @endif
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-6 hotel-info">
                                    <div>
                                        <div class="hotel-header">
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
                                            <p>
                                                <i class="fa fa-map-marker"></i>{{ $ser->city }}
                                                <i class="fa fa-phone"></i>(+91) {{ $ser->mobile }}
                                            </p>
                                        </div>
                                        <div class="hotel-facility">
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
                                        </div>
                                        <div class="hotel-desc">
                                            <p>{{ $ser->meta_description }}</p>
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
