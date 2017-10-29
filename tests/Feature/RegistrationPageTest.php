<?php

namespace Tests\Feature;

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
}
