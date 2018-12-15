<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class PostTest extends TestCase
{
    public function testHomeGet()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/home');
                        
        $response->assertStatus(200);
    }

    public function testCreateNewPost()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post('/post/new', ['tag' => 'test', 'post' => 'test']);

        $response2 = $this->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post('/post/new', ['tag' => '0', 'post' => 'test']);

        $response3 = $this->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post('/post/new', ['tag' => '', 'post' => '']);

        $response->assertStatus(302);
        $response2->assertStatus(302);
        $response3->assertStatus(302);
    }

    public function testUpvotePost()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post('/post/upvote', ['id' => 1]);

        $response->assertStatus(302);
    }
}