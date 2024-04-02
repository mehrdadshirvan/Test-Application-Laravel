<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_user_insert_date()
    {
        $response = User::factory()->make()->toArray();
        User::create($response);
        $this->assertDatabaseHas('users', $response);
    }
}
