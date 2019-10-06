<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'id', 'name', 'enabled'
    ];
    public function status(){
        $this->get();
    }

}
