<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function testHomePageIsStatus200(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
