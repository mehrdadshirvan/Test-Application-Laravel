<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use App\Models\Post;
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

    public function test_user_relationship_with_post()
    {
        $count = rand(1,10);
        $user = User::factory()->has(Post::factory()->count($count))->create();
        $this->assertCount($count,$user->posts);
        $this->assertTrue($user->posts->first() instanceof Post);
    }

    public function test_user_relationship_with_comment()
    {
        $count = rand(1,10);
        $user = User::factory()->has(Comment::factory()->count($count))->create();
        $this->assertCount($count,$user->comments);
        $this->assertTrue($user->comments->first() instanceof Comment);
    }
}
