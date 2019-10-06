<?php

namespace App\Http\Controllers;

use App\Cats;
use App\Field;
use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::all();
        $cats = Cats::all();


        return view('addItem', compact('fields'),compact('cats'));
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
            'weight' => 'required',
            'name' => 'required',
            'cat_id'=> 'required',
        ]);
        $fullContent = $request->all();
        unset($fullContent['_token']);
        unset($fullContent['cat_id']);
        unset($fullContent['name']);
        unset($fullContent['weight']);
        $fullContent = json_encode($fullContent);
        Item::create([
            'weight' => $request->weight,
            'name' => $request->name,
            'cat_id' => $request->cat_id,
            'fullContent' => $fullContent,
        ]);

        return redirect('additem')
            ->with('success', 'Item Created Successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('editItem', [compact('items')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Item $item)
    {
        $attributes = $request->validate([
            'type' => 'required',
        ]);

        $item->update($attributes);

        return redirect('additem')
            ->with('success', 'ItemEdited Successfully');
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
