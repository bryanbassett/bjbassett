<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'link'
    ];
    public function getRouteKeyName(){
        return 'slug';
    }
    public static function totalClicks(){
        return ShortLink::sum('clicks');
    }

}
