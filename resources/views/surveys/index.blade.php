@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <h1>All Surveys</h1>

                            @foreach ($surveys as $survey)
                                <p><a href="/surveys/{{ $survey->id }}">{{ $survey->name }}</a></p>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
