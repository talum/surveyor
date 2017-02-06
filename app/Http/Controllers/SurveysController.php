<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;

class SurveysController extends Controller
{
    //
    public function show(Request $request)
    {
        $survey_id = $request->id;
        $survey = Survey::find($survey_id);
        $questions = $survey->questions;
        $data = [];
        $data["survey"] = $survey;
        $data["questions"] = $questions;
        return view('surveys.show', $data);
    }

    public function index()
    {
        $surveys = Survey::all();
        $data['surveys'] = $surveys;
        return view('surveys.index', $data);
    }
}
