<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content'];
 
    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }

    public function responses()
    {
        return $this->hasMany('App\Response');
    }
}
