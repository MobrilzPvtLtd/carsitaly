<input type="hidden" value="hotels" name="service_type">
<input type="hidden" value="" id="latitude" name="latitude">
<input type="hidden" value="" id="longitude" name="longitude">
<div class="row">
    <h4>Hotel Information</h4>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_hotel_name = 'hotel_name';
            $field_name = 'title';
            $field_lable = label_case($field_hotel_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_hotel_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'category';
            $field_label = label_case($field_name);
            $field_placeholder = "-- Select an option --";
            $required = "required";

            $categories = \Modules\Category\Models\Category::where('status',1)->pluck('name', 'id')->toArray();
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->select($field_name, $categories)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-12 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <h4>Location Details</h4>
    <div class="col-12 col-sm-8 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'address';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->id("search-box")->attributes(['required' => 'required']) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'city';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->id('city')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'state';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->id('state')->attributes(["$required"]) }}
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
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->id('country')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'pin_code';
            $field_lable_name = 'zip_code';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->id('pin_code')->attributes(["$required"]) }}
        </div>
    </div>

    <h4>Contact Information</h4>
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

    <h4>Amenities and Services</h4>
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
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'room_types';
            $field_lable = label_case($field_name);
            $field_placeholder = "-- Select an option --";
            $required = "required";
            $select_options = [
                'single'=>'single',
                'double'=>'double',
                'suite'=>'suite',
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
        </div>
    </div>
    {{-- <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'facilities';
            $field_lable = label_case($field_name);
            $select_options = [
                'conference'=>'conference',
                'rooms'=>'rooms',
                'parking'=>'parking',
                'restaurant'=>'restaurant',
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }}
            {{ html()->select($field_name.'[]', $select_options)->placeholder($field_placeholder)->class('form-control select3')->multiple() }}
        </div>
    </div> --}}

    <h4>Pricing</h4>
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

    <h4>Media</h4>
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
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {{ html()->file($field_name)->class('form-control') }}
        </div>
    </div>

    <h4>Ratings</h4>
    {{-- <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'guest_reviews';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", "max" => 5]) }}
        </div>
    </div> --}}
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
    {{-- <div class="col-12 col-sm-3 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'adults';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div> --}}
    {{-- <div class="col-12 col-sm-4 mb-3">
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

    {{-- <div class="col-12 col-sm-12 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->rows(4) }}
        </div>
    </div> --}}
</div>

<x-library.select2 />

@section('script')
<script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&libraries=drawing,geometry,places"></script>

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
</script>
@endsection
