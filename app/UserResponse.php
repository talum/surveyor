<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    protected $fillable = ['survey_response_id', 'question_id', 'response_id'];

    public function question()
    {
        return $this->belongsTo('App\Question');
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
