<?php

namespace Tests\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsIndex()
    {
        $response = $this->get('/news/1');

        $response->assertStatus(200);
    }

}
