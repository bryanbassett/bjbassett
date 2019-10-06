<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;
use App\Cats;
use App\Item;
class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $section1 = Cats::___scopeAllInSection(1);
        $section2 = Cats::___scopeAllInSection(2);
        $section3 = Cats::___scopeAllInSection(3);


        return view('welcome',compact('section1','section2','section3'));
    }
}
