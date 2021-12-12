<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FetchDataFromRemoteAptTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**  @test */
    public function an_array_data_shoud_be_fetched_from_api()
    {
        $response = $this->get('/api/lifeandstyles');
        $response->assertOk();
    }
}
