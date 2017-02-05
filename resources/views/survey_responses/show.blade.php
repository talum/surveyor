@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <h1>Thanks for submitting your survey</h1>
                        <p>Here's a summary of your responses</p>
                        @foreach ($survey_response->userResponses as $userResponse)
                            <h3>{{ $userResponse->response->question->content }}</h3>
                            <p>{{ $userResponse->response->content }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
