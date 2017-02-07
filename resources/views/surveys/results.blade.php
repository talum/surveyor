@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <h1>{{ $survey->name }}</h1>

                        @foreach ($survey->questions as $question)
                            <p>{{ $question->content }}
                            <ul>
                                @foreach ($question->responses as $response)
                                  <li>{{ $response->content }} {{ $response->userResponses->count() }}</li>
                                
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
