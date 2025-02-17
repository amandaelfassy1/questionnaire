<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionnaireTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_create_questionnaire()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->post('/questionnaires', [
            'title' => 'Test Questionnaire',
            'description' => 'Ceci est un test.',
        ]);
    
        $response->assertRedirect('/questionnaires');
        $this->assertDatabaseHas('questionnaires', ['title' => 'Test Questionnaire']);
    }
    
}
