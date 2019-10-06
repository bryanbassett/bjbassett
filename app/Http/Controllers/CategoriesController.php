<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cats;
class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cats::all();
        return view('addCat', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'section' => 'required',
            'weight' => 'required',
        ]);

        Cats::create([
            'name' => $request->name,
            'section' => $request->section,
            'weight' => $request->weight,
        ]);

        return redirect('addcategory')
            ->with('success', 'Category Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cats $cat)
    {
        return view('editCat', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cats $cat)
    {
       $attributes = $request->validate([
            'name' => 'required',
            'section' => 'required',
            'weight' => 'required',
        ]);

        $cat->update($attributes);

        return redirect('addcategory')
            ->with('success', 'Category Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
