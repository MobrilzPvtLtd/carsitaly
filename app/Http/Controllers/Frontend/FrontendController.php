<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Auth;
use App\Events\Auth\UserLoginSuccess;
use App\Models\Flight;
use Illuminate\Http\Request;
use Carbon\Carbon;


class FrontendController extends Controller
{
    /**
     * Retrieves the view for the index page of the frontend.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function flight(Request $request){
        try{
            $flight = new Flight();
            $flight->one_way = $request->one_way;
            $flight->round_trip = $request->round_trip;
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
    public function car()
    {
        return view('frontend.car');
    }
    public function hotel()
    {
        return view('frontend.hotel');
    }

    public function villa()
    {
        return view('frontend.villa');
    }

    public function tour()
    {
        return view('frontend.tour');
    }

    public function air()
    {
        return view('frontend.air');
    }

    public function cruise()
    {
        return view('frontend.cruise');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function signout()
    {
        return view('auth.login');
    }

    public function forgotpassword()
    {

    }

    // public function register()
    // {
        public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // username
        $username = intval(config('app.initial_username')) + $user->id;
        $user->username = strval($username);
        $user->save();

        event(new UserRegistered($request, $user));

        Auth::login($user);

        return redirect(route('home'));
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // dd($email, $password, $remember);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember_me)) {
            $request->session()->regenerate();

            $user = auth()->user();

            event(new UserLoginSuccess($request, $user));

            return redirect()->intended(route('home', absolute: false));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));
    }







    /**
     * Privacy Policy Page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function privacy()
    {
        return view('frontend.privacy');
    }

    /**
     * Terms & Conditions Page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function terms()
    {
        return view('frontend.terms');
    }
}
