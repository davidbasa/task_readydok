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
        // //correct get
        // $response = $this->json('GET', '/api/klinik/1');
        // $response
        //     ->assertStatus(200)
        //     ->assertJson(['id'=>1, 'name' => 'Gleichner Group', 'description'=> 'Et necessitatibus nobis architecto sit aut dolor a. Quia deserunt sequi consequatur est consequatur adipisci.']);  

        // //false get 
        // $response = $this->json('GET', '/api/klinik/100');
        // $response
        //     ->assertStatus(200)
        //     ->assertJson(['message' => 'Clinic Not Found']);  

        // //create Klinik
        // $response = $this->json('POST', '/api/klinik', ['name' => 'David', 'description'=> 'uyghfbsedukfy']);
        // $response
        //     ->assertStatus(200)
        //     ->assertExactJson(['created' => true,]);
        
        // //update Klinik
        // $response = $this->json('PUT', '/api/klinik/3', ['name' => 'Surya', 'description'=> "Et necessitatibus nobis architecto sit aut dolor a. Quia deserunt"]);
        // $response
        //     ->assertStatus(200)
        //     ->assertExactJson(['updated' => true,]);

        // //delete Klinik
        // $response = $this->json('DELETE', '/api/klinik/7');
        // $response
        //     ->assertStatus(200)
        //     ->assertExactJson(['deleted' => true,]);
    }
}
