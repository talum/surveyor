<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\UserResponse;
use App\Question;
use App\Response;
use App\SurveyResponse;

class UserResponseTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function testSurveyResponsesAssociation()
    {
        $survey_response = SurveyResponse::create(['survey_id' => 1, 'user_id' => 1]);
        $user_response = UserResponse::create(['question_id' => 1, 'response_id' => 1]);
        $this->assertCount(1, $user_response->surveyResponses);
    }

    public function testQuestionAssociation()
    {
        $question = Question::create(['content' => 'some question', 'survey_id' => 1]);
        $user_response = UserResponse::create(['survey_response_id' => 1, 'question_id' => $question->id, 'response_id' => 1]);
        $this->assertCount(1, $user_response->question);
    }

    public function testResponseAssociation()
    {
        $question = Question::create(['content' => 'some question', 'survey_id' => 1]);
        $response = Response::create(['content' => 'a response', 'question_id' => $question->id]);
        $user_response = UserResponse::create(['survey_response_id' => 1, 'question_id' => $question->id, 'response_id' => $response->id]);
        $this->assertCount(1, $user_response->response);
    }
}
