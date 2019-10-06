<?php

namespace App\Http\Controllers;

use App\Field;
use App\ShortLink;
use App\Cats;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::all();
        $cats = Cats::parents()->with('children.children')->get();
        return view('addField', compact('fields'),compact('cats'));
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
            'cat_id' => 'required',
            'type' => 'required',
            'weight' => 'required',
        ]);

        Field::create([
            'name' => $request->name,
            'cat_id' => $request->cat_id,
            'type' => $request->type,
            'weight' => $request->weight,
        ]);

        return redirect('addfield')
            ->with('success', 'Field Created Successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        return view('editField', [compact('fields'),compact('cats')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'cat_id' => 'required',
            'type' => 'required',
        ]);

        $field->update($attributes);

        return redirect('addfield')
            ->with('success', 'Field Edited Successfully');
    }
    public function get_by_category(Request $request)
    {

        if (!$request->cat_id) {

        }
        else {
            $fields = new Field();
            $fields = $fields->where('cat_id',$request->cat_id)->orderBy('weight')->get();
            if($fields->isEmpty()){
                $html = '<hr><p>Somehow, no fields were found attached to this category.</p>';
            }else{
                $html = '<hr><form class="mt-2">';
                $html .= '<input name="name" class="form-control text" type="text" placeholder="Name"><hr>';

                foreach ($fields as $field) {
                    $html .= '<div class="form-group">';
                    if($field->type == 'text'){
                        $html .= '<input name="text///'.$field->name.'" class="form-control text" type="text" placeholder="Text ('.$field->name.')">';
                    }elseif($field->type == 'textarea'){
                        $html .= '<label for="textarea">Text Area ('.$field->name.')</label><textarea name="textarea///'.$field->name.'" id="textarea" class="form-control textarea" rows="3"></textarea>';
                    }elseif($field->type == 'date'){
                        $html .= '<input name="date///'.$field->name.'" class="form-control date" type="date" >';
                    }elseif($field->type == 'link'){
                        $links = new ShortLink();
                        $links = $links->get();
                        $html .= '<select name="link///'.$field->name.'" class="form-control link">';
                        $html .= '<option disabled selected="selected">Link ('.$field->name.')</option>';
                        foreach ($links as $link) {
                            $html .= '<option value="'.$link->id.'" class="form-control link">'.$link->slug.' '.$link->link.'</option>';
                        }
                        $html .= '</select>';
                    }
                    $html .= '</div>';
                }
                $html .= '<input type="text" name="weight" class="form-control" placeholder="Weight" aria-label="weight" placeholder="Weight" >';
                $html.= '</form><div class="input-group-append"><button class="btn btn-success" type="submit">Add Item</button></div>';
            }
        }
        return response()->json(['html' => $html]);
    }

}
