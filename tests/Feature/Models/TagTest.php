<?php

namespace Tests\Feature\Models;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_insert_tag_data(): void
    {
        $data = Tag::factory()->make()->toArray();
        Tag::create($data);
        $this->assertDatabaseHas('tags', $data);
    }
}
