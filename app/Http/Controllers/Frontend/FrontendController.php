<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\BookingMail;
use App\Mail\ContactMail;
use App\Mail\FlightMail;
use App\Models\Booking;
use Auth;
use App\Models\Contact;
use App\Models\Flight;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\Post\Models\Post;

class FrontendController extends Controller
{
    /**
     * Retrieves the view for the index page of the frontend.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $hotels = Service::where('service_type', 'hotels')->where('featured', true)->get();
        $transfers = Service::where('service_type', 'transfers')->where('featured', true)->get();
        $tours = Service::where('service_type', 'tours')->where('featured', true)->get();
        $villas = Service::where('service_type', 'villas')->where('featured', true)->get();
        $cruises = Service::where('service_type', 'cruises')->where('featured', true)->get();
        return view('frontend.index',compact('hotels','transfers','tours','villas','cruises'));
    }

    public function flight(Request $request){
        if(!$request->trip_type){
            session()->flash('error', 'The trip type field is required.');
            return redirect()->back();
        }
        try{
            $users = User::where('email',$request->email)->first();
            if($users){
                $user = User::where('email',$request->email)->first();
            }elseif(!auth()->user()){
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
                $user->password = Hash::make("12345678");
                $user->status = 1;
                $user->save();
                Auth::login($user);
            }

            $flight = new Flight();
            $flight->user_id = auth()->user() ? auth()->user()->id : $user->id;
            $flight->trip_type = $request->trip_type;
            $flight->leaving_from = $request->leaving_from;
            $flight->leaving_to = $request->leaving_to;

            $departureDate = Carbon::parse($request->departure_date)->format('Y-m-d');
            $returnDate = Carbon::parse($request->return_date)->format('Y-m-d');

            $flight->departure_date = $departureDate;
            $flight->return_date = $returnDate;

            $flight->adult_count = $request->adult_count;
            $flight->child_count = $request->child_count;
            $flight->class = $request->class;
            $flight->save();

            $admin = User::where('id', 1)->first();
            $authUserEmail = auth()->user() ? auth()->user()->email : $user->email;

            $data = [
                'admin_name' => $admin->name,
                'name' => auth()->user() ? auth()->user()->name : $user->name,
                'email' => auth()->user() ? auth()->user()->email : $user->email,
                'mobile' => auth()->user() ? auth()->user()->mobile : $user->mobile,
                'trip_type' => $flight->trip_type,
                'leaving_from' => $flight->leaving_from,
                'leaving_to' => $flight->leaving_to,
                'departure_date' => $flight->departure_date,
                'return_date' => $flight->return_date,
                'adult_count' => $flight->adult_count,
                'child_count' => $flight->child_count,
                'class' => $flight->class,
            ];

            if ($authUserEmail) {
                Mail::to($authUserEmail)->send(new FlightMail($data));
            }

            if ($admin->email) {
                Mail::to($admin->email)->send(new FlightMail($data));
            }

            // session()->flash('success', 'Flight booking successful');
            return redirect()->route('thank-you');
        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function thankYou(){
        return view('frontend.thank-you');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactSubmit(Request $request){
        try{
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->mobile = $request->mobile;
            $contact->message = $request->message;
            $contact->message_title = $request->message_title;
            $contact->source = $request->source;
            $contact->save();

            $admin = User::where('id', 1)->first();

            $data = [
                'admin_name' => $admin->name,
                'name' => $contact->name,
                'email' => $contact->email,
                'mobile' => $contact->mobile,
                'message' => $contact->message,
                'message_title' => $contact->message_title,
                'source' => $contact->source,
            ];

            if ($contact->email) {
                Mail::to($contact->email)->send(new ContactMail($data));
            }

            if ($admin->email) {
                Mail::to($admin->email)->send(new ContactMail($data));
            }

            // session()->flash('success', 'Data saved successful');
            return redirect()->route('thank-you');
        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function booking(Request $request){
        // try{
            $users = User::where('email',$request->email)->first();
            if($users){
                $user = User::where('email',$request->email)->first();
            }elseif(!auth()->user()){
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
                $user->password = Hash::make("12345678");
                $user->status = 1;
                $user->save();
                Auth::login($user);
            }

            $booking = new Booking();
            $booking->user_id = auth()->user() ? auth()->user()->id : $user->id;
            $booking->service_id = $request->service_id;
            $booking->booking_type = $request->booking_type;
            $booking->travel_type = $request->travel_type;

            switch ($request->travel_type) {
                case 'flight':
                    $booking->pickup_location = $request->input('pickup_location_flight');
                    $booking->terminal = $request->input('terminal');
                    $booking->travel_number = $request->input('flight_number');
                    $booking->drop_location = $request->input('drop_location_flight');
                    break;

                case 'train':
                    $booking->pickup_location = $request->input('pickup_location_train');
                    $booking->platform = $request->input('platform');
                    $booking->travel_number = $request->input('train_number');
                    $booking->drop_location = $request->input('drop_location_train');
                    break;

                case 'bus':
                    $booking->pickup_location = $request->input('pickup_location_bus');
                    $booking->travel_number = $request->input('bus_number');
                    $booking->drop_location = $request->input('drop_location_bus');
                    break;
            }

            if(!$request->travel_type){
                $booking->pickup_location = $request->input('pickup_location');
                $booking->drop_location = $request->input('drop_location');
            }

            $startDate = Carbon::parse($request->pickup_date)->format('Y-m-d');
            $endDate = Carbon::parse($request->drop_date)->format('Y-m-d');

            $booking->intermediate_stop = $request->input('intermediate_stop');
            $booking->start_date = $startDate;
            $booking->end_date = $endDate;
            $booking->adult = $request->adult;
            $booking->child = $request->child;
            $booking->status = 1;
            $booking->save();

            $service = Service::where('id', $request->service_id)->first();
            $admin = User::where('id', 1)->first();
            $authUserEmail = auth()->user() ? auth()->user()->email : $user->email;

            $data = [
                'admin_name' => $admin->name,
                'name' => auth()->user() ? auth()->user()->name : $user->name,
                'email' => auth()->user() ? auth()->user()->email : $user->email,
                'mobile' => auth()->user() ? auth()->user()->mobile : $user->mobile,
                'pickup_location' => $booking->pickup_location,
                'intermediate_stop' => $booking->intermediate_stop,
                'travel_number' => $booking->travel_number,
                'drop_location' => $booking->drop_location,
                'travel_type' => $booking->travel_type,
                'start_date' => $booking->start_date,
                'end_date' => $booking->end_date,
                'adult' => $booking->adult,
                'child' => $booking->child,
                'booking_type' => $booking->booking_type,
                'title' => $service->title,
                'vehicle_type' => $service->vehicle_type,
                'vehicle_capacity' => $service->vehicle_capacity,
                'luggage_capacity' => $service->luggage_capacity,
                'vehicle_features' => json_decode($service->vehicle_features),
                'amenities' => json_decode($service->amenities),
                'room_types' => $service->room_types,
                'address' => $service->address,
                'city' => $service->city,
                'state' => $service->state,
                'country' => $service->country,
                'pin_code' => $service->pin_code,
                'number_of_bedrooms' => $service->number_of_bedrooms,
                'number_of_bathrooms' => $service->number_of_bathrooms,
                'maximum_occupancy' => $service->maximum_occupancy,
                'square_footage' => $service->square_footage,
            ];

            if ($request->travel_type == 'flight') {
                $data['terminal'] = $booking->terminal;
            } elseif ($request->travel_type == 'train') {
                $data['platform'] = $booking->platform;
            }

            if ($authUserEmail) {
                Mail::to($authUserEmail)->send(new BookingMail($data));
            }

            if ($admin->email) {
                Mail::to($admin->email)->send(new BookingMail($data));
            }

            // session()->flash('success', ucfirst(strtolower($request->booking_type)) . ' ' . 'booking successful');
            return redirect()->route('thank-you');
        // }catch(\Exception $e){
        //     session()->flash('error', $e->getMessage());
        //     return redirect()->back();
        // }
    }
}
