<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;
use function Sodium\increment;

class ShortLinkController extends Controller
{
    function quickRandomx($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
        $total = ShortLink::totalClicks();
        return view('shortenLink', compact('shortLinks','total'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
        ]);

        ShortLink::create([
            'link' => $request->link,
            'slug' => $request->has('slug') ? $request->slug : ShortLinkController::quickRandomx()
        ]);

        return redirect('generate-shorten-link')
            ->with('success', 'Short Link Generated Successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink(ShortLink $shortLink)
    {

        $shortLink->clicks++;
        $shortLink->save();
        return redirect($shortLink->link);
    }
}
