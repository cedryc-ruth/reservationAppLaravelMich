<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


// Nous allons tester la fonctionnalité ou le comportement d'inscription d'un guest

class ModelTest extends TestCase
{
    use RefreshDatabase;  // pour pouvoir utiliser la BDD sqlite (configurer via le fichier phpunit.xml)


    // Tester si un guest arrive à s'inscrire en ayant renseigné toutes les informations

    public function testValidRegistration()
    {
       $faker = Factory::create();
       $email = $faker->unique()->email();  // On récupère un email unique via la librairie Factory
       $count = User::count(); // Connaître le nombre des users enregistrés dans notre BDD

       // On simule l'inscription d'un user

        $response = $this->post('/register', [
            'firstname' => 'test',
            'lastname' => 'test',
            'login' => 'test',
            'name' => 'test',
            'email' => $email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'language_id' => 2
       ]);

        $newCount = User::count();  // Recompter le nombre des users dans la table pour voir s'il a évolué (signe qu'il y a eu inscription)
        $this->assertNotEquals($count, $newCount);  // $count & $newCount ne doivent pas être égaux sinon le test a échoué (pas de création du nouveau user)
    }

    // Tester si un guest n'arrive pas à s'inscrire en n'introduisant pas son email par exemple

    public function testInvalidRegistration()
    {
        $response = $this->post('/register', [
            'firstname' => 'test',
            'lastname' => 'test',
            'login' => 'test',
            'name' => 'test',
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password',
            'language_id' => 2
        ]);

        $response->assertSessionHasErrors(); // On vérifie si au niveau des messages de la session, il y a des erreurs
    }
}
