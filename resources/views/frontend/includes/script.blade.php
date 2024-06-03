<script src="{{ asset('assets/js/respond.js') }}"></script>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/plugins/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/plugins/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/js.js') }}"></script>

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
        $("#price-range").slider({
            range: true,
            min: {{ $minPrice }},
            max: {{ $maxPrice }},
            values: [ {{ $minPrice }}, {{ $maxPrice }} ],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                $("#update-search-price-btn").val(ui.values[0] + "-" + ui.values[1]);
            },
            change: function(event, ui) {
                $("#update-search-price-btn").click();
            }
        });
        $("#amount").val("$ " + $( "#price-range" ).slider( "values", 0 ) +
            " - $ " + $( "#price-range" ).slider( "values", 1 ));
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

<script>
    function toggleCheckbox(checkbox) {
        var checkboxes = document.getElementsByName(checkbox.name);
        checkboxes.forEach(function(item) {
            if (item !== checkbox) item.checked = false;
        });
    }
</script>
@if(session('success'))
    <script>
        var notificationArea = document.getElementById('notification-area');
        var notificationMessage = document.createElement('div');
        notificationMessage.classList.add('notification');

        var messageText = document.createElement('span');
        messageText.textContent = '{{ session('success') }}';
        notificationMessage.appendChild(messageText);

        var closeButton = document.createElement('button');
        closeButton.textContent = '×';
        closeButton.classList.add('close-button');
        closeButton.onclick = function() {
            notificationArea.removeChild(notificationMessage);
        };
        notificationMessage.appendChild(closeButton);

        notificationArea.appendChild(notificationMessage);

        setTimeout(function(){
            notificationArea.removeChild(notificationMessage);
        }, 10000); // 10 seconds
    </script>

@endif
