<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class PageTest extends TestCase
{
    public function testSlash()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function testHomeUnAuth()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }

    public function testHomeAuth()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }

    public function testIFrameEmpty()
    {
        $response = $this->get('/iframe');

        $response->assertStatus(404);
    }
}