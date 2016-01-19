<?php

use App\Spacetime\BitwiseManipulator;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BitwiseManipulatorTest extends TestCase
{
    public function testBinaryStringExpansionWithDefaults()
    {
        $this->assertEquals('0000111100001111', BitwiseManipulator::generateExpandedBinary([0,1,0,1]));
    }

    public function testBinaryStringExpansionWithStringArgument()
    {
        $this->assertEquals('0000111100001111', BitwiseManipulator::generateExpandedBinary('0101', 4, false));
    }

    public function testBinaryStringExpansionWithNonDefaultRepeatLength()
    {
        $this->assertEquals('00110011', BitwiseManipulator::generateExpandedBinary('0101', 2, false));
    }
}
