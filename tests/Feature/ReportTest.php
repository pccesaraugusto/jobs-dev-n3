<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ReportTest
 * @package Tests\Feature
 */
class ReportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/reports');
       /* $response = $this->post('/api/reports/create', [
            'external_id' => 'ASV3455645FSAS',
            'title' => 'NEWS TITLE',
            'url' => 'http://www.test.com',
            'summary' => 'test test test test test test test test test test test test test test test'
        ]);*/

        $response->assertStatus(200);
    }
}
