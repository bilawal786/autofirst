<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    public function marque()
    {
        return $this->belongsTo('App\Marque', 'marque_id');
    }
}
