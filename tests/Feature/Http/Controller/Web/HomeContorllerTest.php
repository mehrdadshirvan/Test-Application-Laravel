<?php

namespace Tests\Feature\Http\Controller\Web;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeContorllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_index(): void
    {
        Post::factory()->count(100)->create();

        $response = $this->get(route('web.home'));
        $response->assertStatus(200);
        $response->assertViewIs('web.welcome');
        $response->assertViewHas('posts', Post::query()->latest()->paginate(15));
    }
}
