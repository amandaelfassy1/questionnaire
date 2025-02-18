<?php
namespace Database\Factories;

use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
            'questionnaire_id' => Questionnaire::factory(),
            'question_text' => $this->faker->sentence,
            'type' => 'text', // Peut être 'text', 'boolean', 'multiple_choice'
            'options' => null,
        ];
    }
}
