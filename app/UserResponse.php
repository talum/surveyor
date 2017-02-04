<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function response()
    {
        return $this->belongsTo('App\Response');
    }

}
