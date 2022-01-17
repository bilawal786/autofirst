<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
//    protected $dates = ['start_date', 'end_date'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle', 'vehicle_id');
    }
}
