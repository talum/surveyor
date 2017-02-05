@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <h1>{{ $survey->name }}</h1>

                        {!! Form::open(['url' => '/survey_responses']) !!}
                            {{ Form::hidden('survey_id', $survey->id) }}
                            @foreach ($questions as $question)
                                <p>{{ $question->content }}
                                @foreach ($question->responses as $response)
                                    <div class="form-group">
                                        {{ Form::label( $response->content, null, ['class' => 'control-label']) }}
                                        {{ Form::radio( ("questions[question_$question->id]"), $response->id ) }}
                                    </div>

                                @endforeach
                            @endforeach
                            <p>{{ Form::submit('Submit') }}</p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
