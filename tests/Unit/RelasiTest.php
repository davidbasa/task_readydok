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
        //create relasi
        $response = $this->json('POST', '/api/relasi', ['dokter_id' => 2, 'klinik_id'=> 5]);
        $response
            ->assertStatus(200)
            ->assertExactJson(['created' => true,]);

        //correct get
        $response = $this->json('GET', '/api/relasi/12');
        $response
            ->assertStatus(200)
            ->assertJson(['id'=>12, 'dokter_id' => 2, 'klinik_id'=> 5]);  

        //false get 
        $response = $this->json('GET', '/api/relasi/100');
        $response
            ->assertStatus(200)
            ->assertJson(['message' => 'Relation Not Found']);  

        //delete relasi
        $response = $this->json('DELETE', '/api/relasi/6');
        $response
            ->assertStatus(200)
            ->assertExactJson(['deleted' => true,]);

    }
}
