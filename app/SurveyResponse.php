<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    //
    protected $fillable = ['survey_id', 'user_id'];

    public function userResponses()
    {
        return $this->hasMany('App\UserResponse');
    }

    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
