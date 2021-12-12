<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckUrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test*/
    public function url_provided_must_be_in_lower_case()
    {
        $data = "sections";
        $response = $this->get('/api/'.$data);
        $response->assertStatus(200);
        
    }

   
}
