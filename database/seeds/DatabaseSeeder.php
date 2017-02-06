<?php

use Illuminate\Database\Seeder;
use App\Survey;
use App\Question;
use App\Response;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $survey = Survey::create([
          'name' => 'Behavioral Survey'
        ]);

        $question_1 = Question::create([
          'content' => 'What did you eat for breakfast?',
          'survey_id' => $survey->id
        ]);

        $q1_r1 = Response::create([
          'content' => 'Cereal',
          'question_id' => $question_1->id
        ]);

        $q1_r2 = Response::create([
          'content' => 'Pancakes',
          'question_id' => $question_1->id
        ]);

        $q1_r3 = Response::create([
          'content' => 'Eggs',
          'question_id' => $question_1->id
        ]);

        $question_2 = Question::create([
          'content' => 'How do you feel today?',
          'survey_id' => $survey->id
        ]);

        $q2_r1 = Response::create([
          'content' => 'Good',
          'question_id' => $question_2->id
        ]);

        $q2_r2 = Response::create([
          'content' => 'Bad',
          'question_id' => $question_2->id
        ]);

        $question_3 = Question::create([
          'content' => 'What did you do today?',
          'survey_id' => $survey->id
        ]);

        $q3_r1 = Response::create([
          'content' => 'Sleep',
          'question_id' => $question_3->id
        ]);

        $q3_r2 = Response::create([
          'content' => 'Exercise',
          'question_id' => $question_3->id
        ]);

        $q3_r3 = Response::create([
          'content' => 'Work',
          'question_id' => $question_3->id
        ]);

    }
}
