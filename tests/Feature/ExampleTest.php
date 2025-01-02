<?php

namespace Tests\Feature;

<<<<<<< HEAD
use Illuminate\Foundation\Testing\RefreshDatabase;
=======
// use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> tundeseun/devtest
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
<<<<<<< HEAD
     *
     * @return void
     */
    public function testBasicTest()
=======
     */
    public function test_the_application_returns_a_successful_response(): void
>>>>>>> tundeseun/devtest
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
