<?php

namespace App;

use App\Http\Controllers\FieldController;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'id', 'cat_id', 'fullContent', 'name','weight'
    ];
    protected $casts = [
       'fullContent' => 'json'
    ];
    public function deCode($arg){
        return json_decode($arg);
    }

    public function figureIt($lookup,$item){
        $fc = new FieldController;
        $type = (explode('///',$lookup ))[0];
        $name = str_replace('_',' ',(explode('///',$lookup ))[1]);
        if($type == 'link'){
             return '<a class=" '.$fc->makeClass($name).'" href="/s/'.ShortLink::find($item)->slug.'">'.$name.'</a>';
        }elseif($type == 'text' || $type == 'textarea'){
            return '<p class=" '.$fc->makeClass($name).'">'.$item.'</p>';
        }elseif($type == 'date'){
            return '<p class=" '.$fc->makeClass($name).'">'.$item.'</p>';
        }

    }
    public function category()
    {
        return $this->belongsTo(Cats::class, 'cat_id');
    }

    public function includedFields()
    {
        return $this->category()->hasFields()->get();
    }
    public function AllItems()
    {
        return $this->where('cat_id', $cat_id)->orderBy('weight');
    }

    public function scopeAllInCategory($query, $category)
    {
        return $query->where('cat_id', $category)->orderBy('weight');
    }
}
