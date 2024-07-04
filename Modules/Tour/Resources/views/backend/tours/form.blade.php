<input type="hidden" value="tours" name="service_type">
<div class="row">
    <h4>Tour Information</h4>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'title';
            $field_lable_name = 'tour_name';
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
    <h4>Location Details</h4>
    <div class="col-12 col-sm-3 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'starting_point';
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
            $field_name = 'ending_point';
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
            $field_name = 'destinations';
            $field_lable_name = 'destinations_covered';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-3 mb-3">
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
            $field_name = 'duration';
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
            $field_name = 'start_date';
            $field_lable_name = 'start_date and time';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->date($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-3 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'end_date';
            $field_lable_name = 'end_date and time';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->date($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
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

    <h4>Pricing</h4>
    <div class="col-12 col-sm-4 mb-3">
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

    <h4>Itinerary</h4>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'itinerary';
            $field_lable_name = 'day-by-Day Itinerary';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    {{-- <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'free_time';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div> --}}
    <div class="col-12 col-sm-8 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'description_details';
            $field_lable_name = 'activity_details';
            $field_lable = label_case($field_lable_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_lable_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
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
            {{ html()->file($field_name)->class('form-control')->multiple() }}
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
</div>

<x-library.select2 />

<script>
    flatpickr("#start_date", {
        // mode: "multiple",
        dateFormat: "Y-m-d",
        minDate: "today"
    });
    flatpickr("#end_date", {
        // mode: "multiple",
        dateFormat: "Y-m-d",
        minDate: "today"
    });
</script>
