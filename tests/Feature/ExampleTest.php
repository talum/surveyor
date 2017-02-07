<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }


    public function testHomeWithAuth()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)
          ->withSession(['foo' => 'bar'])
          ->get('/home');

        $response->assertStatus(200);
    }

    public function testHomeWithoutAuth()
    {
          $response = $this->get('/home');

        $response->assertStatus(302);
    }

    public function testSurveysWithAuth()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)
          ->withSession(['foo' => 'bar'])
          ->get('/surveys');

        $response->assertStatus(200);
    }

    public function testSurveysWithoutAuth()
    {
          $response = $this->get('/surveys');

        $response->assertStatus(302);
    }
}
