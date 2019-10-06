<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'section','weight','parent_id','items'
    ];

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Cats::class, 'parent_id');
    }
    public function noParent()
    {
        return $this->parent()->get()->isEmpty();
    }

    public function children()
    {
        return $this->hasMany(Cats::class, 'parent_id');
    }

    public function isChildless()
    {
        return $this->children()->get()->isEmpty();
    }
    public static function figureIt($lookup,$item)
    {
        $explode = explode('///', $lookup);
        $type = $explode[0];

        $name = str_replace('_', ' ', (explode('///', $lookup))[1]);
        if ($type == 'link') {
            return '<a href="/s/' . ShortLink::find($item)->slug . '">' . $name . '</a>';
        } elseif ($type == 'text' || $type == 'textarea') {
            return '<p class="' . $name . '">' . $item . '</p>';
        } elseif ($type == 'date') {
            return '<p class="' . $name . '">' . $item . '</p>';
        }
    }
    public static function &___scopeAllInSection($section)
    {
        $section = Cats::where('section', $section)->orderBy('weight')->get();
        foreach($section as $key => $cat){
            $cat_id=$cat->id;
            $items = Item::allInCategory($cat_id)->get();
            foreach($items as $bid =>$item){
                $item = json_decode($item->fullContent,true);
                foreach($item as $it_id => $it){
                    $item2 = Cats::figureIt($it_id,$it);
                    $item[$it_id]=$item2;
                }
                $items=$item;
            }
            $section[$key]->items=$items;
        }
        return $section;
    }



    public function hasFields()
    {
        return $this->hasMany(Field::class, 'cat_id');
    }

    public function allFields()
    {
        return $this->hasFields()->get();
    }

    public function hasItems()
    {

        return $this->hasMany(Item::class, 'cat_id')->orderBy('weight');
    }

    public function allItems()
    {
       return $this->hasItems()->get();
    }

}
