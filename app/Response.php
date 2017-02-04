<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = ['content', 'question_id'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

}
