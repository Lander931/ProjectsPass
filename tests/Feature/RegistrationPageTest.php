<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationPageTest extends TestCase
{
    public function testRegistrationPageAvailable()
    {
        $response = $this->get(route('register',[],false));
        
        $response->assertStatus(200);
    }

    public function testRegistrationFailedAction()
    {
        $response = $this->post(route('register',[],false));
        
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function testRegistrationAction()
    {
        $name = Factory::create()->name;
        $email = Factory::create()->email;
        $password = Factory::create()->password();

        $response = $this->post(route('register'),[
            'name'                  => $name,
            'email'                 => $email,
            'password'              => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('project.index'));

        $user = User::whereEmail($email)->first();

        $this->assertNotNull($user);
        $this->assertEquals($user->name,$name);
        $this->assertNotEquals($user->password,$password);
        $this->assertTrue(password_verify($password,$user->password));
    }
}
