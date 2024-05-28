<div class="row">
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'title';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'brand';
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
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'price';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-3 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'warranty';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-3 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'mileage';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-3 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'seating_capacity';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", "max" => 5]) }}
        </div>
    </div>
    <div class="col-12 col-sm-3 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'top_speed';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", "max" => 5]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'transmission';
            $field_lable = label_case($field_name);
            $required = "required";
            $select_options = [
                'any'=>'Any',
                'automatic'=>'Automatic',
                'mannual'=>'Mannual',
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'engine_type';
            $field_lable = label_case($field_name);
            $required = "required";
            $select_options = [
                'all'=>'All',
                'gas'=>'Gas',
                'diesel'=>'Diesel',
                'electric'=>'Electric',
                'patrol'=>'Patrol',
                'hybrid'=>'Hybrid',
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'car_features';
            $field_lable = label_case($field_name);
            // $field_placeholder = "-- Select options --";
            $select_options = [
                'carAC'=>'Car AC',
                'GPSNavigation'=>'GPS Navigation',
                'sateliteNavigation'=>'Satelite Navigation',
                'musicSystem'=>'Music System',
                'powerLock'=>'Power Lock',
                'FMRadio'=>'FM Radio',
                'HiFISoundSystem'=>'Hi FI Sound System',
                'Mileage'=>'Mileage 12KM/Liter',
                '4Doors&PanoramaView'=>'4 Doors & Panorama View',
                'automaticTransmission'=>'Automatic Transmission',
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }}
            {{ html()->select($field_name.'[]', $select_options)->placeholder($field_placeholder)->class('form-control select3')->multiple()->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-3 mb-3">
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
    <div class="col-12 col-sm-3 mb-3">
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
    <div class="col-12 col-sm-3 mb-3">
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
    <div class="col-12 col-sm-4 mb-3">
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
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'car_type';
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
            $field_name = 'pickUp_date';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'return_date';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
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
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'images';
            $field_image = 'image[]';
            $field_label = label_case($field_name);
            $field_placeholder = $field_label;
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {{ html()->file($field_image)->class('form-control')->multiple() }}
        </div>
    </div>
    <div class="col-12 col-sm-8 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'meta_description';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
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
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->rows(4)->attributes(["$required"]) }}
        </div>
    </div>
</div>
<x-library.select2 />

@section('script')
<script>
    flatpickr("#pickUp_date", {
        dateFormat: "Y-m-d",
        minDate: "today"
    });
    flatpickr("#return_date", {
        dateFormat: "Y-m-d",
        minDate: "today"
    });
</script>
@endsection
