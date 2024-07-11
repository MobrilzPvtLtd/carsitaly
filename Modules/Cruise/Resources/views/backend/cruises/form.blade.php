<input type="hidden" value="cruises" name="service_type">
<div class="row">
    <h4>Cruise Information</h4>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'title';
            $field_lable_name = 'cruise_name';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-8 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->rows(3)->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'cruise_line';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'ship_name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    {{-- <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div> --}}

    <h4>Itinerary and Destinations</h4>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'start_date';
            $field_lable_name = 'start_date and time';
            $field_label = label_case($field_lable_name);
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'end_date';
            $field_lable_name = 'end_date and time';
            $field_label = label_case($field_lable_name);
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'departure';
            $field_lable_name = 'departure_port';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->id("departure")->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'destination';
            $field_lable_name = 'destination_ports';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->id("destination")->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'return';
            $field_lable_name = 'return_port';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->id("return")->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'duration';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-8 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'itinerary';
            $field_lable_name = 'day-by-Day Itinerary';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->rows(4)->attributes(["$required"]) }}
        </div>
    </div>

    <h4>Pricing and Packages</h4>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'price';
            $field_lable_name = 'base_price';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'package';
            $field_lable_name = 'package_options';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <h4>Cabin and Accommodation Details</h4>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'cabin_type';
            $field_lable = label_case($field_name);
            $field_placeholder = "-- Select an option --";
            $select_options = [
                'interior'=>'interior',
                'oceanview'=>'oceanview',
                'balcony'=>'balcony',
                'suite'=>'suite',
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'cabin_images';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {{ html()->file($field_name)->class('form-control')}}
        </div>
    </div>
    <div class="col-12 col-sm-8 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'description_details';
            $field_lable_name = 'description';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <h4>Onboard Services and Amenities</h4>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'amenities';
            $field_lable = label_case($field_name);
            $amenities = \Modules\Amenity\Models\Amenity::where('status',1)->pluck('name','name')->toArray();
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }}
            {{ html()->select($field_name.'[]', $amenities)->placeholder($field_placeholder)->class('form-control select3')->multiple() }}
        </div>
    </div>
    {{-- <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'included';
            $field_lable_name = 'included_services';
            $field_lable = label_case($field_lable_name);
            $amenities = \Modules\Amenity\Models\Amenity::where('status',1)->pluck('name','name')->toArray();
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }}
            {{ html()->select($field_name, $amenities)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div> --}}
    {{-- <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'optional';
            $field_lable_name = 'optional_services';
            $field_lable = label_case($field_lable_name);
            $select_options = [
                'spa treatments'=>'spa treatments',
                'specialty dining'=>'specialty dining',
            ];
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div> --}}
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'entertainment';
            $field_lable_name = 'entertainment_options';
            $field_lable = label_case($field_lable_name);
            $select_options = [
                'shows'=>'shows',
                'movies'=>'movies',
                'live music'=>'live music',
            ];
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'dining';
            $field_lable_name = 'dining_options';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <h4>Safety and Regulations</h4>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'safety';
            $field_lable_name = 'safety_information';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'age';
            $field_lable_name = 'age_restrictions';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'health';
            $field_lable_name = 'health_requirements';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'cancellation_policy';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'terms_and_conditions';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <h4>Media Management</h4>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'images';
            $field_image = 'images[]';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {{ html()->file($field_image)->class('form-control')->multiple() }}
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'videos';
            $field_lable_name = "videos only youtube link.";
            $field_label = label_case($field_lable_name);
            $field_placeholder = $field_label;
            ?>
            {{ html()->label($field_label, $field_lable_name)->class('form-label') }}
            {{ html()->text($field_name)->class('form-control') }}
        </div>
    </div>

    <h4>Contact Informations</h4>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'email';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->email($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'mobile';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <h4>Ratings</h4>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'rating';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", "max" => 5]) }}
        </div>
    </div>

    <div class="col-12 col-sm-2 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'featured';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            <div class="checkbox" style="margin-top: 35px;">
                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
                <input name="{{ $field_name }}" value="1" type="checkbox" @if(old($field_name, setting($field_name))) checked="checked" @endif style="width: 30px;">
            </div>
        </div>
    </div>

    {{-- <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'city';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'country';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-3 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'pin_code';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'address';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = label_case($field_name);
            $field_placeholder = "-- Select an option --";
            $required = "required";
            $select_options = [
                '1'=>'Published',
                '0'=>'Unpublished',
                '2'=>'Draft'
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div> --}}
</div>

<x-library.select2 />

@section('script')
<script>
    flatpickr("#start_date", {
        mode: "multiple",
        dateFormat: "Y-m-d",
        minDate: "today"
    });
    flatpickr("#end_date", {
        mode: "multiple",
        dateFormat: "Y-m-d",
        minDate: "today"
    });
</script>

{{-- <script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&libraries=drawing,geometry,places"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var autocomplete;
        var id = 'search-box';

        autocomplete = new google.maps.places.Autocomplete((document.getElementById(id)),{
            types:['geocode'],
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            var addressComponents = place.address_components;
            var address = '';
            var city = '';
            var state = '';
            var country = '';
            var zipcode = '';
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();

            for (var i = 0; i < addressComponents.length; i++) {
                var component = addressComponents[i];
                if (component.types.includes('street_number')) {
                    address += component.long_name + ', ';
                } else if (component.types.includes('route')) {
                    address += component.long_name;
                } else if (component.types.includes('locality')) {
                    city = component.long_name;
                } else if (component.types.includes('administrative_area_level_1')) {
                    state = component.long_name;
                } else if (component.types.includes('country')) {
                    country = component.long_name;
                } else if (component.types.includes('postal_code')) {
                    zipcode = component.long_name;
                }
            }

            $('#address').val(address);
            $('#city').val(city);
            $('#state').val(state);
            $('#country').val(country);
            $('#pin_code').val(zipcode);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);

        });
    });
</script> --}}

<script type="module" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&libraries=drawing,geometry,places"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var autocompleteOptions = {
                types: ['geocode']
            };

            var autocompleteDeparture = new google.maps.places.Autocomplete(document.getElementById('departure'), autocompleteOptions);
            var autocompleteDestination = new google.maps.places.Autocomplete(document.getElementById('destination'), autocompleteOptions);
            var autocompleteReturn = new google.maps.places.Autocomplete(document.getElementById('return'), autocompleteOptions);
        });
    </script>
@endsection
