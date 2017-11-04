<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{
    public function testShowProjectList()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post(route('login'));

        $response->assertStatus(302);
        $response->assertRedirect('/project');
    }

    public function testCreateProjectPageAvailable(){
        $user = factory(User::class)->create();
        $this->actingAs($user)->post(route('login'));
        
        $response = $this->get(route('project.create'));
        $response->assertStatus(200);
    }
}
