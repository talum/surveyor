<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Survey;
use App\SurveyResponse;
use App\UserResponse;

class SurveyResponseTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSurveyResponseConstructor()
    {
        $survey_response = new SurveyResponse(['survey_id' => '1', 'user_id' => 1]);
        $this->assertEquals(1, $survey_response->survey_id);
    }
    
    public function testSurveysAssociation()
    {
        $survey = Survey::create(['name' => 'new survey']);
        $survey_response = SurveyResponse::create(['survey_id' => $survey->id, 'user_id' => 1]);
        $this->assertCount(1, $survey_response->survey);
    }

    public function testUserResponseAssociation()
    {
        $survey = Survey::create(['name' => 'new survey']);
        $survey_response = SurveyResponse::create(['survey_id' => $survey->id, 'user_id' => 1]);
        $user_response = UserResponse::create(['survey_response_id' => $survey_response->id, 'question_id' => 1, 'response_id' => 1]);
        $this->assertCount(1, $survey_response->userResponses);
    }

}
