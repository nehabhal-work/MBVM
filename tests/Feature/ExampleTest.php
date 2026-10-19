<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_karya_updates_page_displays_updates(): void
    {
        $response = $this->get('/karya');

        $response->assertOk()
            ->assertSee('महासंघाचे कार्य / घडामोडी')
            ->assertSee('UDCPR मधील TDR वापर मर्यादेबाबत');
    }
}
