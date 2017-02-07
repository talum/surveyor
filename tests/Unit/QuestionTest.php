<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Question;
use App\Survey;
use App\Response;
use App\UserResponse;
use App\SurveyResponse;

class QuestionTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testQuestionConstructor()
    {
        $question = new Question(['content' => 'new question', 'survey_id' => 1]);
        $this->assertEquals('new question', $question->content);
    }
    
    public function testSurveyAssociation()
    {
        $survey = Survey::create(['name' => 'new survey']);
        $question = Question::create(['content' => 'new question', 'survey_id' => $survey->id]);
        $this->assertEquals($survey->title, $question->survey->title);
    }

    public function testResponsesAssociation()
    {
        $survey = Survey::create(['name' => 'new survey']);
        $question = Question::create(['content' => 'new question', 'survey_id' => $survey->id]);
        $response = Response::create(['content' => 'response 1', 'question_id' => $question->id]);
        $response_2 = Response::create(['content' => 'response 2', 'question_id' => $question->id]);
        $this->assertCount(2, $question->responses);
    }

    public function testUserResponsesAssociation()
    {
        $survey = Survey::create(['name' => 'new survey']);
        $question = Question::create(['content' => 'new question', 'survey_id' => $survey->id]);
        $response = Response::create(['content' => 'response 1', 'question_id' => $question->id]);
        $response_2 = Response::create(['content' => 'response 2', 'question_id' => $question->id]);
        $survey_response = SurveyResponse::create(['user_id'=> 1, 'survey_id'=> $survey->id]);
        $user_response = UserResponse::create(['question_id' => $question->id, 'response_id' => $response->id, 'survey_response_id' => $survey_response->id]);
        $this->assertCount(1, $question->userResponses);
    }
}
