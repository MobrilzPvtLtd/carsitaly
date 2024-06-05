<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
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
        $cars = Car::count();
        $hotels = Service::where('service_type', 'hotels')->count();
        $tours = Service::where('service_type', 'tours')->count();
        $cruises = Service::where('service_type', 'cruises')->count();
        $villas = Service::where('service_type', 'villas')->count();
        $users = User::count();
        $booking = Booking::count();
        return view('backend.index',compact('flight','contact','cars','hotels','tours','cruises','villas','users','booking'));
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
}
