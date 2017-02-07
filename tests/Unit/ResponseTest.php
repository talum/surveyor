<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Question;
use App\Response;

class ResponseTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testResponseConstructor()
    {
        $response = new Response(['content' => 'new response', 'survey_id' => 1]);
        $this->assertEquals('new response', $response->content);
    }
    
    public function testQuestionAssociation()
    {
        $question = Question::create(['content' => 'new question', 'survey_id' => 1]);
        $response = Response::create(['content' => 'response 1', 'question_id' => $question->id]);
        $this->assertEquals($question->content, $response->question->content);
    }

}
