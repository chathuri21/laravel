<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Event::fake();
    }
    /** @test */
    public function only_logged_in_users_can_see_the_article_list()
    {
        $response = $this->get('/home')->assertRedirect('/login');
    }

    
    /** @test */
    public function only_logged_in_users_can_access_article_edit_link()
    {
        $response = $this->get('/post/10/edit')->assertRedirect('/login');
    }

    /** @test */
    // public function authenticated_users_can_access_article_edit_page()
    // {
    //     $this->actingAsAdmin();

    //     $response = $this->get('/post/17/edit')->assertOk();
    // }

    /** @test */
    public function authenticated_users_can_see_the_article_list()
    {
        $this->actingAsAdmin();

        $response = $this->get('/home')->assertOk();
    }

    /** @test */
    // public function a_customer_can_be_deleted_own_article()
    // {
    //     $this->actingAsAdmin();

    //     $response = $this->post('/post', $this->data());
    //     $newPostId = Post::all()->take(1)->get('id');

    //     $response = $this->delete('/post/'.$newPostId);
    //     $response->assertSessionHasErrors('user_id');
    //     $this->assertCount(0, Post::all());
    // }

    /** @test */
    public function a_customer_can_be_added_through_the_form()
    {
        $this->actingAsAdmin();

        $response = $this->post('/post', $this->data());

        $this->assertCount(1, Post::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        $this->actingAsAdmin();

        $response = $this->post('/post', array_merge($this->data(), ['title' => '']));

        $response->assertSessionHasErrors('title');

        $this->assertCount(0, Post::all());
    }

    private function data()
    {
        return [
            'title' => 'Test Title',
            'body' => 'Test Body'
        ];
    }
    
    private function actingAsAdmin()
    {
        $this->actingAs(factory(User::class)->create());
    }
}
