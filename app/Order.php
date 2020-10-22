<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function tree()
    {
        return $this->belongsTo('App\Tree');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
