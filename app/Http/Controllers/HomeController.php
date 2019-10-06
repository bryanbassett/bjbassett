<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;
use App\Settings;
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
        //$ShortLink = new ShortLink;
        $totalClicks = ShortLink::totalClicks();
        $settings = Settings::all();
        return view('home', compact('totalClicks','settings'));
    }
}
