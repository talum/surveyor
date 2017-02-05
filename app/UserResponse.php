<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    protected $fillable = ['survey_response_id', 'user_id', 'response_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function response()
    {
        return $this->belongsTo('App\Response');
    }

    public function surveyResponse()
    {
        return $this->belongsTo('App\SurveyResponse');
    }

}
