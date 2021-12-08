<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class RelasiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        // //correct get
        // $response = $this->json('GET', '/api/relasi/1');
        // $response
        //     ->assertStatus(200)
        //     ->assertJson(['id'=>1, 'dokter_id' => 2, 'klinik_id'=> 1, 'created_at'=>"2021-12-06T14:20:53.000000Z", 'updated_at'=>"2021-12-06T14:20:53.000000Z" ]);  

        // //false get 
        // $response = $this->json('GET', '/api/relasi/100');
        // $response
        //     ->assertStatus(200)
        //     ->assertJson(['message' => 'Relation Not Found']);  

        // //create relasi
        // $response = $this->json('POST', '/api/relasi', ['dokter_id' => 2, 'klinik_id'=> 5]);
        // $response
        //     ->assertStatus(200)
        //     ->assertExactJson(['created' => true,]);

        // //delete relasi
        // $response = $this->json('DELETE', '/api/relasi/8');
        // $response
        //     ->assertStatus(200)
        //     ->assertExactJson(['deleted' => true,]);
    }
}
