<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'id','name', 'cat_id', 'type','weight'
    ];

    public function category()
    {
        return $this->belongsTo(Cats::class, 'cat_id')->get()->first();
    }
    public function cat()
    {
        return $this->hasOne(Cats::class, 'id');
    }
}
