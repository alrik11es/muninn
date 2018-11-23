<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Event;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'agents_count' => Agent::count(),
            'events_count' => Event::count(),
            'recent_events_count' => Event::count(),
        ];
        return view('home', $data);
    }
}
