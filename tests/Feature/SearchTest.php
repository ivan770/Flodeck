<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class SearchTest extends TestCase
{
    public function testTagSearchFail()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/post/search?tag=0');
                        
        $response->assertStatus(404);
    }

    // public function testTagSearchSuccess()
    // {
    //     $user = factory(User::class)->create();

    //     $response = $this->actingAs($user)
    //                      ->get('/post/search?tag=test');
                        
    //     $response->assertStatus(200);
    // }

    public function testUserSearchFail()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/profile?id=0');
                        
        $response->assertStatus(404);
    }

    public function testUserSearchSuccess()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/profile?id=1');
                        
        $response->assertStatus(200);
    }
}