<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function home()
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        if (!$user->hasVerifiedEmail()) {
            return to_route('verification.notice');
        }

        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function verifyNotice()
    {
        return view('auth.verify');
    }

    public function handleVerification(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/');
    }

    public function verifyResend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
