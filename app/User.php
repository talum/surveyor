<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userResponses()
    {
        return $this->hasMany('App\UserResponse');
    }

    public function responses()
    {
        return $this->hasMany('App\Response', 'App\UserResponse');
    }

    public function surveyResponses()
    {
        return $this->hasMany('App\SurveyResponse');
    }

}
