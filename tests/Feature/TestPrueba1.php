<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;
//use Tests\TestCase;

class TestPrueba1 extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        $n=1;
        if(n==0){
            echo
            $this->assertTrue(true);
        }
        else if(n % 2 >0){
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(true);
        }

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
