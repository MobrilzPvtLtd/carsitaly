<div class="row">
    <div class="modify-search modify-car">
        <div class="container clear-padding">
            <form wire:submit.prevent="applyFilter">
                <div class="col-md-4">
                    <div class="form-gp">
                        @if ($serviceType == "carrentals")
                        <label>Car Rental Name</label>
                        @else
                        <label>{{ ucfirst(strtolower($serviceType)) }} Name</label>
                        @endif
                        <div class="input-group margin-bottom-sm">
                            <input wire:model.live="searchTerm" type="text" id="search-bar" name="title" class="form-control" placeholder="E.g. Italy">
                            <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                            {{-- <input type="text" wire:model="city" name="city" class="form-control" required placeholder="E.g. London" id="city">
                            <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-2 col-sm-6 col-xs-6">
                    <div class="form-gp">
                        <label>Pick Up Date</label>
                        <div class="input-group margin-bottom-sm">
                            <input type="text" id="check_in" name="check_in" class="form-control" placeholder="MM/DD/YYYY" wire:model="check_in">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <div class="form-gp">
                        <label>Return Date</label>
                        <div class="input-group margin-bottom-sm">
                            <input type="text" id="check_out" name="check_out" class="form-control" placeholder="MM/DD/YYYY" wire:model="check_out">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <div class="form-gp">
                        <label>Transfers Type</label>
                        <select class="custom-select-room" wire:model="carType" style="width: 150px;">
                            <option value="">select</option>
                            @foreach ($uniqueVehicleType as $ctype)
                                <option>{{ $ctype }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-gp">
                        <label>Budget</label>
                        <div class="input-group margin-bottom-sm">
                            <select class="custom-select-room" wire:model="budgetPrice" style="width: 150px;">
                                <option value="">All</option>
                                @foreach ($uniquePrice as $price)
                                    <option value="{{ $price }}">$ {{ $price }}</option>
                                @endforeach
                            </select>
                        </div>
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
    <div class="container">
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
                    {{-- <div id="price-range"></div> --}}
                    <div wire:ignore>
                        <div id="price-range"></div>
                        <button id="update-search-price-btn" wire:click="updateSearchPrice($event.target.value)" style="display: none;"></button>
                    </div>
                </div>
                <div class="star-filter filter">
                    <h5><i class="fa fa-dashboard"></i>  Vehicle Type</h5>
                    <ul>
                        @foreach ($uniqueVehicleType as $vehicle_type)
                            <li>
                                <input type="checkbox" wire:model.live="filterVehicleType.{{ $vehicle_type }}" value="{{ $vehicle_type }}">
                                {{ $vehicle_type }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="location-filter filter">
                    <h5><i class="fa fa-certificate"></i> Luggage Capacity</h5>
                    <ul>
                        @foreach ($uniqueLuggageCapacity as $capacity)
                            <li>
                                <input type="checkbox" wire:model.live="filterLuggageCapacity.{{ $capacity }}" value="{{ $capacity }}">
                                {{ $capacity }} Bags
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="facilities-filter filter">
                    <h5><i class="fa fa-cog"></i> Vehicle Features</h5>
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
                        <option value="lowest_price"> Low to High</option>
                        <option value="highest_price"> High to Low</option>
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
                @if(count($cars) > 0)
                    @foreach ($cars as $car)
                        <div  class="hotel-list-view">
                            <div class="wrapper">
                                <div class="col-md-4 col-sm-6 switch-img clear-padding">
                                    @if($car->images)
                                        @php
                                            $images = json_decode($car->images);
                                        @endphp

                                        @if($images && count($images) > 0)
                                        <a href="{{ route('frontend.' . $serviceType . '.show', $car->slug) }}">
                                            <img src="{{ asset('public/storage/' . $images[0]) }}" alt="transfer">
                                        </a>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-6 hotel-info">
                                    <div>
                                        <div class="hotel-header">
                                            <a href="{{ route('frontend.' . $serviceType . '.show', $car->slug) }}">
                                                <h5>{{ $car->title }}
                                                    <span>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $car->rating)
                                                                <i class="fa fa-star colored"></i>
                                                            @else
                                                                <i class="fa fa-star-o colored"></i>
                                                            @endif
                                                        @endfor
                                                    </span>
                                                </h5>
                                            </a>
                                            {{-- <p>{{ $car->brand }} <span>({{ $car->car_type }})</span></p> --}}
                                        </div>

                                        <div class="car-detail">
                                            {{-- <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                                <p><i class="fa fa-calendar"></i>{{ $car->warranty }} Year</p>
                                            </div> --}}
                                            {{-- <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                                <p><i class="fa fa-road"></i>{{ $car->mileage }} KM</p>
                                            </div> --}}
                                            <div class="clearfix"></div>
                                            <div class="col-md-12 col-sm-6 col-xs-6 clear-padding">
                                                <p><i class="fa fa-suitcase"></i> <strong>Luggage Capacity: </strong>{{ $car->luggage_capacity }} bags</p>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-6 clear-padding">
                                                <p><i class="fa fa-users"></i><strong>Vehicle Capacity: </strong>{{ $car->vehicle_capacity }} Person</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
                                                <p><i class="fa fa-dashboard"></i> <strong>Vehicle Type :</strong> {{ $car->vehicle_type }}</p>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-6 clear-padding">
                                                <p>
                                                    <i class="fa fa-cog"></i> <strong>Vehicle Features :</strong>
                                                @if($car->vehicle_features)
                                                    @foreach (json_decode($car->vehicle_features) as $amenityName)
                                                        @php
                                                            $amenityDetails = $uniqueAmenities[$amenityName];
                                                        @endphp

                                                        <img src="{{ asset('public/storage/' . $amenityDetails->icon) }}" alt="hotel" width="50px" style="min-height: 50px !important;">{{ $amenityDetails->name }}
                                                    @endforeach
                                                @endif
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="hotel-desc">
                                            <p>{{ $car->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix visible-sm-block"></div>
                                <div class="col-md-2 rating-price-box text-center clear-padding car-item">
                                    {{-- <div class="rating-box">
                                        <div class="user-rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                            <span>128 Guest Reviews.</span>
                                        </div>
                                    </div> --}}
                                    <div class="room-book-box">
                                        <div class="price">
                                            <h5>${{ $car->price }}/Person</h5>
                                        </div>
                                        <div class="book">
                                            <a href="{{ route('frontend.' . $serviceType . '.show', $car->slug) }}">BOOK</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="text-center" style="margin-top: 100px">No data available</h4>
                @endif
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="bottom-pagination">
                {{ $cars->links('livewire.pagination-livewire') }}
                {{-- <nav class="pull-right">
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
                </nav> --}}
            </div>
        </div>
    </div>
</div>
