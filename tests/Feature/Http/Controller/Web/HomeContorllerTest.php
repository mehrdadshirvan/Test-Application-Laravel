<?php

namespace Tests\Feature\Http\Controller\Web;

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
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
