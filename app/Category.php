<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //vehicles
    public function vehicles()
    {
        return $this->hasMany('App\Vehicle', 'category');
    }
}
