<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_insert_comment_data(): void
    {
        $data = Comment::factory()->make()->toArray();
        Comment::create($data);
        $this->assertDatabaseHas('comments', $data);
    }
}
