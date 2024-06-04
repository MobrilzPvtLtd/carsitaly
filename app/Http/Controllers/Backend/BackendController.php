<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;

class BackendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.index');
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
}
