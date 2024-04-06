<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_insert_post_data(): void
    {
        $data = Post::factory()->make()->toArray();
        Post::create($data);
        $this->assertDatabaseHas('posts', $data);
    }
}
