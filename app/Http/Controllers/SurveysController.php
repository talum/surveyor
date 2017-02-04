<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveysController extends Controller
{
    //
    public function show()
    {
        return view('surveys.show');
    }
}
