<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


// Classe qui tester les routes

class RouteTest extends TestCase
{
    use RefreshDatabase;
    public function testAccessAdminWithGuestRole()
    {
        // On vérifie qu'un guest qui essaie d'accéder à la page admin soit rédirigé à la page de connexion de Voyager TCG 
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }
}
