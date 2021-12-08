<?php

namespace Tests\Unit;

use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class KlinikTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {

        //create Klinik
        $response = $this->json('POST', '/api/klinik', ['name' => 'David', 'description'=> 'uyghfbsedukfy']);
        $response
            ->assertStatus(200)
            ->assertExactJson(['created' => true,]);
        
        //update Klinik
        $response = $this->json('PUT', '/api/klinik/3', ['name' => 'Surya', 'description'=> "Et necessitatibus nobis architecto sit aut dolor a. Quia deserunt"]);
        $response
            ->assertStatus(200)
            ->assertExactJson(['updated' => true,]);
        
        //correct get
        $response = $this->json('GET', '/api/klinik/11');
        $response
            ->assertStatus(200)
            ->assertJson(['id'=>11, 'name' => 'David', 'description'=> 'uyghfbsedukfy']);  

        //false get 
        $response = $this->json('GET', '/api/klinik/100');
        $response
            ->assertStatus(200)
            ->assertJson(['message' => 'Clinic Not Found']);  


        //delete Klinik
        $response = $this->json('DELETE', '/api/klinik/6');
        $response
            ->assertStatus(200)
            ->assertExactJson(['deleted' => true,]);

    }
}
