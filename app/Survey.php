<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function surveyResponses()
    {
        return $this->hasMany('App\SurveyResponse');
    }

}
