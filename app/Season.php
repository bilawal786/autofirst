<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
//    protected $dates = ['start_date', 'end_date'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
