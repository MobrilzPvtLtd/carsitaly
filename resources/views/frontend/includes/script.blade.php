<script src="{{ asset('assets/js/respond.js') }}"></script>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/plugins/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/plugins/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/js.js') }}"></script>

<script>
    $(document).ready(function() {
        $("#sortBy").on('change', function() {
            let sortBy = $("#sortBy").val();
            // alert(sortBy);
            $.ajax({
                url: 'api/fetch-data',
                type: 'GET',
                data: {
                    sortBy: sortBy
                },
                success: function(response) {
                    console.log("response ka data" ,response);
                    // $(".switchable").html(response);
                    // response.data.forEach(function(item) {
                    //     $("#hotel-list").append(item);
                    // });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>

<script>
    // $(function() {
    //     "use strict";

    //     $( "#price-range" ).slider({
    //         range: true,
    //         min: <?php echo $minPrice; ?>,
    //         max: <?php echo $maxPrice; ?>,
    //         values: [ <?php echo $minPrice; ?>, <?php echo $maxPrice; ?> ],
    //         slide: function( event, ui ) {
    //             // console.log(7576);
    //             $( "#amount" ).val( "$ " + ui.values[ 0 ] + " - $ " + ui.values[ 1 ] );
    //             this.set('searchTerm', ui.values[ 1 ]);
    //         }
    //     });

    //     $( "#amount" ).val( "$ " + $( "#price-range" ).slider( "values", 0 ) +
    //         " - $ " + $( "#price-range" ).slider( "values", 1 ) );
    // });

    $(document).ready(function(){
        // var livewireId = "{{ $id }}";
        // console.log(livewireId);
        $("#price-range").slider({
            range: true,
            min: {{ $minPrice }},
            max: {{ $maxPrice }},
            values: [ {{ $minPrice }}, {{ $maxPrice }} ],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                // this.set('searchTerm', ui.values[1]);
            },
            // change: function(event, ui) {
            //     this.set('searchTerm', ui.values[1]);
            // }
        });
        ( "#amount" ).val( "$ " + $( "#price-range" ).slider( "values", 0 ) +
            " - $ " + $( "#price-range" ).slider( "values", 1 ) );
    });

    // $(function() {
    //     "use strict";

    //     $( "#price-range" ).slider({
    //         range: true,
    //         min: <?php echo $minPrice; ?>,
    //         max: <?php echo $maxPrice; ?>,
    //         values: [ <?php echo $minPrice; ?>, <?php echo $maxPrice; ?> ],
    //         slide: function( event, ui ) {
    //             $( "#amount" ).val( "$ " + ui.values[ 0 ] + " - $ " + ui.values[ 1 ] );

    //             $.ajax({
    //                 url: 'api/fetch-data',
    //                 type: 'GET',
    //                 data: {
    //                     minPrice: ui.values[0],
    //                     maxPrice: ui.values[1]
    //                 },
    //                 success: function(response) {
    //                     console.log(response);
    //                     // $(".hotel-list").html(response);
    //                     response.data.forEach(function(item) {
    //                         $("#hotel-list").append(item);
    //                     });
    //                 },
    //                 error: function(xhr, status, error) {
    //                     console.error(error);
    //                 }
    //             });
    //         }
    //     });

    //     $( "#amount" ).val( "$ " + $( "#price-range" ).slider( "values", 0 ) +
    //         " - $ " + $( "#price-range" ).slider( "values", 1 ) );
    // });
</script>
