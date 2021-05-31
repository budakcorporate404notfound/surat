<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanSeeAllArticles()
    {
        // $response = $this->get('/');

        // $response->assertStatus(200);

        $response = $this->get('/cobaUnitTest');

        $response->assertStatus(200);
        $response->assertSee('Judul Blog');
        // $response->assertViewIs('article.index');
    }
}
