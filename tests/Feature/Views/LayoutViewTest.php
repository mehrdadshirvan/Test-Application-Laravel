<?php

namespace Tests\Feature\Views;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LayoutViewTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_layout_view_rendered_when_user_is_admin(): void
    {
        $this->actingAs(User::factory()->state(['type'=>'admin'])->create());
        $view = $this->view('layout.layout');
        $view->assertSee('<a href="/admin/dashboard">Admin Panel</a>',false);
    }

    public function test_layout_view_rendered_when_user_is_not_admin(): void
    {
        $this->actingAs(User::factory()->state(['type'=>'user'])->create());
        $view = $this->view('layout.layout');
        $view->assertDontSee('<a href="/admin/dashboard">Admin Panel</a>',false);
    }
}
