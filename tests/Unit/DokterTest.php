<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class DokterTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {

        //create doctor
        $response = $this->json('POST', '/api/dokter', ['name' => 'David', 'email'=> 'david@mail.com', 'phone' => '0812121212', 'address'=>"dewisartika"]);
        $response
            ->assertStatus(200)
            ->assertExactJson(['created' => true,]);
        
        //update doctor
        $response = $this->json('PUT', '/api/dokter/6', ['name' => 'Surya', 'email'=> 'surya@mail.com', 'phone' => '081212177712', 'address'=>'jl. kartini']);
        $response
            ->assertStatus(200)
            ->assertExactJson(['updated' => true,]);

        //correct get
        $response = $this->json('GET', '/api/dokter/11');
        $response
            ->assertStatus(200)
            ->assertJson(['id'=>11, 'name' => 'David', 'email'=> 'david@mail.com', 'phone' => '0812121212', 'address'=>"dewisartika"]);  

        //false get 
        $response = $this->json('GET', '/api/dokter/100');
        $response
            ->assertStatus(200)
            ->assertJson(['message' => 'Doctor Not Found']);  
        
        //delete doctor
        $response = $this->json('DELETE', '/api/dokter/6');
        $response
            ->assertStatus(200)
            ->assertExactJson(['deleted' => true,]);

    }
}
