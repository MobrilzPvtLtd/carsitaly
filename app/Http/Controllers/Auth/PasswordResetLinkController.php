<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Support\Str;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $password = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );

        $request_params = [
            'email' => $request->email,
            'token' => Str::random(40)
        ];

        if ($password) {
            DB::table('password_reset_tokens')->update($request_params);
        } else {
            DB::table('password_reset_tokens')->insertGetId($request_params);
        }

        return redirect()->route('password.reset');

        // return $status == Password::RESET_LINK_SENT
        //             ? back()->with('status', __($status))
        //             : back()->withInput($request->only('email'))
        //                 ->withErrors(['email' => __($status)]);

    }
}
