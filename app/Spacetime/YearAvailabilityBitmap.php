<?php

namespace App\Spacetime;


use GMP;

class YearAvailabilityBitmap
{
    protected $binary;

    /**
     * Initialise the bitmap, ensure we always have a GMP object.
     *
     * @param $binary
     */
    public function __construct($binary)
    {
        if (! ($binary instanceof GMP)) {
            $binary = gmp_init($binary, 2);
        }

        $this->binary = $binary;
    }

    public static function fromWeeklyBitmap(GMP $weeklyMap)
    {

    }

    public function GMPInstance()
    {
        return $this->binary;
    }
}