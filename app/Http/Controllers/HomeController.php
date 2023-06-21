<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\User;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

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
        $geouserip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        $accident_reported = Accident::all()->where('reporter', auth()->id())->count();
        $accident_responded = Accident::all()->where('reporter', auth()->id())->where('status', '!==','PENDING')->count();
//        dd($accident_reported);

        $all_users = User::all()->where('id', auth()->id())->first();
        return view('home', compact('all_users','geouserip', 'accident_reported', 'accident_responded' ));
    }

    public function accident_history()
    {
        $accident_history = Accident::all()->where('reporter', auth()->id());

        return view('pages.accident.index', compact('accident_history'));
    }
}
