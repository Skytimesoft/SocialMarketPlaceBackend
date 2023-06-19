<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

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
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('Buyer')) {
            return redirect(RouteServiceProvider::BUYER_HOME);
        }

        if ($user->hasRole('Seller')) {
            return redirect(RouteServiceProvider::SELLER_HOME);
        }

        if ($user->hasRole('Admin')) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        return redirect('/login');
    }
}
