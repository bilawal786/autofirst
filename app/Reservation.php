<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle', 'vehicle_id');
    }
    public function start()
    {
        return $this->belongsTo('App\Agency', 'start_point');
    }
    public function end()
    {
        return $this->belongsTo('App\Agency', 'end_point');
    }
}
