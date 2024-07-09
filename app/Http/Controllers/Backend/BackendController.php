<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Service;
use App\Models\User;
use Modules\Car\Models\Car;

class BackendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $flight = Flight::count();
        $contact = Contact::count();
        $cars = Service::count();
        $hotels = Service::where('service_type', 'hotels')->count();
        $tours = Service::where('service_type', 'tours')->count();
        $cruises = Service::where('service_type', 'cruises')->count();
        $villas = Service::where('service_type', 'villas')->count();
        $users = User::count();
        $booking = Booking::count();
        return view('backend.index',compact('flight','contact','cars','hotels','tours','cruises','villas','users','booking'));
    }
    public function categoryAmenities()
    {
        return view('backend.category-amenities');
    }

    public function contactMessage()
    {
        $contacts = Contact::get();
        return view('backend.contact', compact('contacts'));
    }

    public function bookings()
    {
        $bookings = Booking::get();
        return view('backend.bookings', compact('bookings'));
    }

    public function flightEnquiry()
    {
        $flight = Flight::get();
        return view('backend.flight', compact('flight'));
    }

    // dd($target);
    public function is_view(Request $request){
        $target = $request->input('target');
        $total = 0;
        switch ($target) {
            case 'bookings':
                Booking::where('seen', 0)->update(['seen' => 1]);
                break;
            case 'flight':
                Flight::where('seen', 0)->update(['seen' => 1]);
                break;
            case 'contact':
                Contact::where('seen', 0)->update(['seen' => 1]);
                break;
            default:
                $total = 0;
                break;
        }

        return response()->json(['status' => 'success', 'total' => $total]);
    }
}
