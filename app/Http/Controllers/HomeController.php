<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reservations = Reservation::latest()->take(5)->get();
        $reservationsamount = Reservation::all();
        return view('home', compact('reservations', 'reservationsamount'));
    }
}
