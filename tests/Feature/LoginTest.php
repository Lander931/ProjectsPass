<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    public function testLoginPageAvialable()
    {
        $response = $this->get(route('login'));
        
        $response->assertStatus(200);
    }
    public function testLoginFailedAction()
    {
        $response = $this->post(route('login'));
        
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function testLoginAction()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post(route('login'));

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }
}
