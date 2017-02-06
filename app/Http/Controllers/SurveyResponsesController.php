<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SurveyResponse;
use App\UserResponse;

class SurveyResponsesController extends Controller
{
    //
    public function store(Request $request)
    {
        $current_user_id = Auth::id();
        $survey_id = $request->survey_id;
        $survey_response = SurveyResponse::create([
          "user_id" => $current_user_id,
          "survey_id" => $survey_id
        ]);

        $user_responses = $request->questions;

        foreach ($user_responses as $question_id => $response_id) {

          UserResponse::create([
            "question_id" => $question_id,
            "response_id" => $response_id,
            "survey_response_id" => $survey_response->id
          ]);
        }

        return view('survey_responses.show', ['survey_response' => $survey_response]);
    }
}
