<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Survey;
use App\SurveyResponse;
use App\UserResponse;
use App\Question;

class SurveyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSurveyConstructor()
    {
        $survey = new Survey(['name' => 'new survey']);
        $this->assertEquals('new survey', $survey->name);
    }
    
    public function testQuestionAssociation()
    {
        $survey = Survey::create(['name' => 'new survey']);
        $question = Question::create(['content' => 'new question', 'survey_id' => $survey->id]);
        $this->assertCount(1, $survey->questions);
    }

    public function testSurveyResponsesAssociation()
    {
        $survey = Survey::create(['name' => 'new survey']);
        $survey_response = SurveyResponse::create(['survey_id' => $survey->id, 'user_id' => 1]);
        $this->assertCount(1, $survey->surveyResponses);
    }

    public function testUserResponsesAssociation()
    {
        $survey = Survey::create(['name' => 'new survey']);
        $survey_response = SurveyResponse::create(['survey_id' => $survey->id, 'user_id' => 1]);
        $user_response = UserResponse::create(['survey_response_id' => $survey_response->id, 'question_id' => 1, 'response_id' => 1]);
        $this->assertCount(1, $survey->userResponses);
    }

}
