<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_answer_questionnaire()
    {
        $user = User::factory()->create();
        $questionnaire = Questionnaire::factory()->create();
        $question = Question::factory()->create(['questionnaire_id' => $questionnaire->id]);
    
        $this->actingAs($user)
            ->post(route('questionnaires.submit', $questionnaire->id), [
                'responses' => [$question->id => 'Ma réponse'],
            ])
            ->assertRedirect(route('questionnaires.index'));
    
        $this->assertDatabaseHas('responses', ['question_id' => $question->id, 'user_id' => $user->id]);
    }
    
}
