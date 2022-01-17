<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function marque()
    {
        return $this->belongsTo('App\Marque', 'marque_id');
    }
    public function modal()
    {
        return $this->belongsTo('App\Modal', 'modal_id');
    }
}
