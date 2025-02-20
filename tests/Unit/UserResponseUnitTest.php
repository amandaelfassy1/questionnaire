<?php

namespace Tests\Unit;

use App\Models\Response;
use PHPUnit\Framework\TestCase;

class UserResponseUnitTest extends TestCase
{
    public function test_user_can_create_response()
    {
        $response = new Response();
        
        $response->fill([
            'user_id' => 1,
            'question_id' => 1,
            'answer' => 'Ma réponse test'
        ]);

        //  Vérifier que les attributs sont bien assignés
        $this->assertEquals(1, $response->user_id);
        $this->assertEquals(1, $response->question_id);
        $this->assertEquals('Ma réponse test', $response->answer);
    }
}
