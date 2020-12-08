<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $n=q;
        if($n==0){
            echo("neutro");
            $this->assertTrue(true);
        }
        else if($n % 2 >0){
            echo("impar");
            $this->assertTrue(true);
        }
        else{
            echo("par");
            $this->assertTrue(true);
        }    
    }
}
