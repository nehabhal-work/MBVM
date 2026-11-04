<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SandhiPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_sandhi_page_renders_its_tabs_form_and_updated_footer_links(): void
    {
        $this->get(route('sandhi.index'))
            ->assertOk()
            ->assertSee('जाहिरात / व्यावसायिक संधी')
            ->assertSee('संयुक्त विकास संधी (JV / JD)')
            ->assertSee('प्रकल्प जाहिराती')
            ->assertSee('sandhi-form')
            ->assertSee('महत्त्वाचे दुवे')
            ->assertSee('दस्तऐवज व संधी')
            ->assertSee(route('sandhi.index') . '#sandhi-panel-ad');
    }
}
