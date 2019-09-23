<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;

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

        return view('shortenLink', compact('shortLinks'));
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

        $input['link'] = $request->link;
        if(empty($request->slug)){
            $input['slug'] = ShortLinkController::quickRandomx();
        }else{
            $input['slug'] = $request->slug;
        }


        ShortLink::create($input);

        return redirect('generate-shorten-link')
            ->with('success', 'Shorten Link Generated Successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($slug)
    {
        $find = ShortLink::where('slug', $slug)->first();

        return redirect($find->link);
    }
}
