<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\UserResponse;
use App\User;
use App\SurveyResponse;
use App\Response;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserConstructor()
    {
        $user= new User(['name' => 'new user', 'email' => 'example@example.com', 'password' => 'password']);
        $this->assertEquals('example@example.com', $user->email);
    }
    
    public function testSurveyResponsesAssociation()
    {
        $user = User::create(['name' => 'name', 'email' => 'example2@example.com', 'password' => 'password']);
        $survey_response = SurveyResponse::create(['survey_id' => 1, 'user_id' => $user->id]);
        $this->assertCount(1, $user->surveyResponses);
    }

    public function testUserResponseAssociation()
    {
        $user = User::create(['name' => 'name', 'email' => 'example3@example.com', 'password' => 'password']);
        $survey_response = SurveyResponse::create(['survey_id' => 1, 'user_id' => $user->id]);
        $response = Response::create(['content' => 'some response', 'question_id' => 1]);
        $user_response = UserResponse::create(['survey_response_id' => $survey_response->id, 'question_id' => 1, 'response_id' => $response->id]);
        $this->assertCount(1, $user->userResponses);
    }

}
