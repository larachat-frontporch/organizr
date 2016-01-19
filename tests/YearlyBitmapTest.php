<?php

use App\Spacetime\YearAvailabilityBitmap;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class YearlyBitmapTest extends TestCase
{
    public function testAnInstanceOfGMPIsAlwaysRetrieved()
    {
        $this->assertInstanceOf('GMP', (new YearAvailabilityBitmap('0011'))->GMPInstance());
        $this->assertInstanceOf('GMP', (new YearAvailabilityBitmap(gmp_init('0011')))->GMPInstance());
    }
}
