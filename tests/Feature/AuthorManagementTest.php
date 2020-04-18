<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_author_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->post('/authors', [
            'name' => 'Victor Smith',
            'dob' => '12/21/1989'
        ]);

        $author = Author::all();

        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        $this->assertEquals('1989/21/12', $author->first()->dob->format('Y/d/m'));
    }
}
