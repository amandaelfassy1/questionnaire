<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase; 

    /**
     * Test de création d'un utilisateur avec un rôle
     */
    public function test_admin_can_create_user_with_role()
    {
        //  Créer un utilisateur administrateur pour effectuer le test
        $adminRole = Role::create(['role_name' => 'admin']);
        $admin = User::factory()->create(['role_id' => $adminRole->id]);

        //  Simuler la connexion de l'admin
        $this->actingAs($admin);

        //  Créer un rôle participant pour le test
        $participantRole = Role::create(['role_name' => 'participant']);

        //  Simuler l'envoi du formulaire de création d'un utilisateur
        $response = $this->post(route('users.store'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => $participantRole->id,
        ]);

        //  Vérifier que l'utilisateur a bien été créé en base
        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => $participantRole->id,
        ]);

        //  Vérifier que la redirection s'est bien faite après la création
        $response->assertRedirect(route('users.index'));
    }

    /**
     * Test d'affichage de la liste des utilisateurs
     */
    public function test_admin_can_view_users_list()
    {
        //  Créer un admin
        $adminRole = Role::create(['role_name' => 'admin']);
        $admin = User::factory()->create(['role_id' => $adminRole->id]);

        //  Créer un utilisateur normal
        $participantRole = Role::create(['role_name' => 'participant']);
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'role_id' => $participantRole->id
        ]);

        //  Simuler la connexion de l'admin
        $this->actingAs($admin);

        //  Accéder à la liste des utilisateurs
        $response = $this->get(route('users.index'));

        //  Vérifier que la page charge correctement
        $response->assertStatus(200);

        //  Vérifier que l'utilisateur créé est bien affiché sur la page
        $response->assertSee('John Doe');
        $response->assertSee('john@example.com');
    }
}
