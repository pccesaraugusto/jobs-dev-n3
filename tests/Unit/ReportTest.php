<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\Models\User;

/**
 * Class ReportTest
 * @package Tests\Unit
 *
 * TODO: Implement it.
 */
class ReportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function testCreateReport()
    {        
        $response = $this->post('/api/reports/create', [
             'external_id' => 'ASV3455645FSAS',
             'title' => 'NEWS TITLE',
             'url' => 'http://www.test.com',
             'summary' => 'test test test test test test test test test test test test test test test'
         ]);
 
         $response->assertStatus(200);
    }

    /**
     * @test
     * **/
    public function testGetAllReports(){
        $response = $this->get('/api/reports');

        $response->assertStatus(200);
    }

    /**
     * @test
     * **/
    public function testGetReportsById(){
        $response = $this->get('/api/reports/2');

        $response->assertStatus(200);
    }

    /**
     * @test
     * **/
    public function testDeleteReports(){
        $response = $this->delete('/api/reports/delete/2');

        $response->assertStatus(200);
    }

    /**
     * @test
     * **/
    public function testUpdateReports(){
        $response = $this->put('/api/reports/update/2', [
            'external_id' => 'ASV34556',
            'title' => 'OLD TITLE',
            'url' => 'http://www.testagora.com',
            'summary' => 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq'
        ]);

        $response->assertStatus(200);
    }
}
