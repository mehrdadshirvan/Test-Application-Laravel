<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\Models\Post;
class PostTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new Post();
    }

    public function test_post_relationship_with_user()
    {
        $post = Post::factory()->for(User::factory())->create();
        $this->assertTrue(isset($post->user->id));
        $this->assertTrue($post->user instanceof User);
    }

    public function test_post_relationship_with_tag()
    {
        $count = rand(1,10);
        $post = Post::factory()->has(Tag::factory()->count($count))->create();
        $this->assertCount($count,$post->tags);
        $this->assertTrue($post->tags->first() instanceof Tag);
    }

    public function test_post_relationship_with_comment()
    {
        $count = rand(1,10);
        $post = Post::factory()->has(Comment::factory()->count($count))->create();
        $this->assertCount($count, $post->comments);
        $this->assertTrue($post->comments->first() instanceof Comment);
    }


}
