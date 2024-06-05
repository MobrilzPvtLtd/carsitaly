<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Auth;
use App\Models\Contact;
use App\Models\Flight;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
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
        $posts = Post::where('status', 1)->get();
        return view('frontend.index',compact('posts'));
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
            session()->flash('success', 'Flight booking successful');
            return redirect()->back();
        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
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
            session()->flash('success', 'Data saved successful');
            return redirect()->back();
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

            $booking = new Booking();
            $booking->user_id = auth()->user() ? auth()->user()->id : $user->id;
            $booking->service_id = $request->service_id;
            $booking->booking_type = $request->booking_type;
            $booking->start_date = $request->start_date;
            $booking->end_date = $request->end_date;
            $booking->adult = $request->adult;
            $booking->child = $request->child;
            $booking->room_type = $request->room_type;
            $booking->status = 1;
            $booking->save();
            session()->flash('success', ucfirst(strtolower($request->booking_type)) . ' ' . 'booking successful');
            return redirect()->back();
        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
