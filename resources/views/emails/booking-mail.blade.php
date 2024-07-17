<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }

        .contact-main-div {
            width: 100%;
            display: inline-block;
            background: #f5f5f5;
            height: 100vh;
        }

        .contact-us-content {
            width: 50%;
            padding: 10px 20px;
            background: #ffffff;
            margin: 0px auto;
            margin-top: 5%;
            border-radius: 5px;
        }

        .contact-table {
            width: 100%;
        }

        table.contact-table tr {
            display: flex;
            width: 100%;
            float: left;
            border-top: 1px solid #f5f5f5;
            padding: 10px 0px;
        }

        table.contact-table tr td {
            width: 50%;
            float: left;
            font-size: 16px;
            color: #8C8889;
        }

        table.contact-table tr td:nth-child(2) {
            text-align: right;
        }
        @media only screen and (max-width: 600px) {
           .contact-us-content {
                width:90%;
            }
        }
    </style>
</head>

<body>
    <section class="contact-main-div">
        <div class="contact-us-content">
            <h2 style="text-align: center;font-weight: 400;">A New Request from
                {{ ucfirst($data['name']) }}
            </h2>
            <table class="contact-table">
                <tbody>
                    <tr>
                        <td>
                          User Name
                        </td>
                        <td>
                            {{ $data['name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            User Email
                        </td>
                        <td>
                            {{ $data['email'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            User Phone
                        </td>
                        <td>
                            {{ $data['mobile'] }}
                        </td>
                    </tr>

                    @if($data['travel_type'])
                        <tr>
                            <td>
                                Mode of travel
                            </td>
                            <td>
                                {{ $data['travel_type'] }}
                            </td>
                        </tr>
                    @endif

                    @if($data['booking_type'] == 'transfers' || $data['booking_type'] == 'carrentals')
                        <tr>
                            <td>
                                Pickup location
                            </td>
                            <td>
                                {{ $data['pickup_location'] }}
                            </td>
                        </tr>
                    @endif

                    @if($data['travel_type'] == 'flight')
                        <tr>
                            <td>
                                Treminal
                            </td>
                            <td>
                                {{ $data['terminal'] }}
                            </td>
                        </tr>
                    @endif

                    @if($data['travel_type'] == 'train')
                        <tr>
                            <td>
                                Platform
                            </td>
                            <td>
                                {{ $data['platform'] }}
                            </td>
                        </tr>
                    @endif

                    @if($data['booking_type'] != 'transfers')
                        @if($data['booking_type'] == 'carrentals')
                            <tr>
                                <td>
                                    Intermediate Stops
                                </td>
                                <td>
                                    {{ $data['intermediate_stop'] }}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td>
                                Pickup Date
                            </td>
                            <td>
                                {{ $data['start_date'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Dropoff Date
                            </td>
                            <td>
                                {{ $data['end_date'] }}
                            </td>
                        </tr>
                    @endif

                    @if($data['travel_type'])
                        <tr>
                            <td>
                                {{ ucfirst($data['travel_type']) }} number
                            </td>
                            <td>
                                {{ $data['travel_number'] }}
                            </td>
                        </tr>
                    @endif

                    @if($data['booking_type'] == 'transfers' || $data['booking_type'] == 'carrentals')
                        <tr>
                            <td>
                                Drop-off location
                            </td>
                            <td>
                                {{ $data['drop_location'] }}
                            </td>
                        </tr>
                    @endif

                    @if($data['booking_type'] != 'transfers')
                        <tr>
                            <td>
                                Adult
                            </td>
                            <td>
                                {{ $data['adult'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Child
                            </td>
                            <td>
                                {{ $data['child'] }}
                            </td>
                        </tr>
                    @endif

                    @if($data['booking_type'] == 'transfers' || $data['booking_type'] == 'carrentals')
                        <tr>
                            <td>
                                Vehicle Name
                            </td>
                            <td>
                                {{ $data['title'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Vehicle Type
                            </td>
                            <td>
                                {{ $data['vehicle_type'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Luggage Capacity
                            </td>
                            <td>
                                {{ $data['luggage_capacity'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Vehicle Features
                            </td>
                            <td>
                                @foreach ($data['vehicle_features'] as $features)
                                    {{ $features }}
                                @endforeach
                            </td>
                        </tr>
                    @endif

                    @if($data['booking_type'] == 'hotels' || $data['booking_type'] == 'villas')
                        <tr>
                            <td>
                                {{ ucfirst($data['booking_type']) }} Name
                            </td>
                            <td>
                                {{ $data['title'] }}
                            </td>
                        </tr>
                        @if($data['booking_type'] == 'hotels')
                            <tr>
                                <td>
                                    Room Types
                                </td>
                                <td>
                                    {{ $data['room_types'] }}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td>
                                Amenities
                            </td>
                            <td>
                                @foreach ($data['amenities'] as $amenities)
                                    {{ $amenities }}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                {{ $data['address'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                City
                            </td>
                            <td>
                                {{ $data['city'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                State
                            </td>
                            <td>
                                {{ $data['state'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Country
                            </td>
                            <td>
                                {{ $data['country'] }}
                            </td>
                        </tr>
                        @if($data['booking_type'] == 'hotels')
                            <tr>
                                <td>
                                    Zip Code
                                </td>
                                <td>
                                    {{ $data['pin_code'] }}
                                </td>
                            </tr>
                        @endif

                        @if($data['booking_type'] == 'villas')
                            <tr>
                                <td>
                                    Number of Bedrooms
                                </td>
                                <td>
                                    {{ $data['number_of_bedrooms'] }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Number of Bathrooms
                                </td>
                                <td>
                                    {{ $data['number_of_bathrooms'] }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Maximum Occupancy
                                </td>
                                <td>
                                    {{ $data['maximum_occupancy'] }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Square Footage
                                </td>
                                <td>
                                    {{ $data['square_footage'] }}
                                </td>
                            </tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
