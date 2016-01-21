<?php

namespace App\Spacetime;


use Carbon\Carbon;
use GMP;

class YearAvailabilityBitmap
{
    /**
     * The underlying GMP object containing the binary to operate on.
     *
     * @var \GMP
     */
    protected $binary;

    /**
     * Initialise the bitmap, ensure we always have a GMP object.
     *
     * @param  \GMP|string  $binary
     */
    public function __construct($binary)
    {
        if (! ($binary instanceof GMP)) {
            $binary = gmp_init($binary, 2);
        }

        $this->binary = $binary;
    }

    /**
     * Create a bitmap for the entire year from one for a week.
     *
     * @param  \GMP  $weeklyMap
     * @return YearAvailabilityBitmap
     */
    public static function fromWeeklyBitmap(GMP $weeklyMap)
    {
        // First we need to convert the weekly bitmap to UTC.
        // The challenge in this is when the shift implies
        // availability that shifts from Sun to Mon and
        // vice versa. Uncertain how we'll tackle it.
        // TODO: implement conversion

        // Once converted, we need to figure out on what day the 1st of
        // January occurs, perform a right shift to get rid of every
        // day before that, and finally create our binary string.
        // The rest is done by left shifting and adding weeks.
        $daysToShift = Carbon::create(null, 1, 1, 0, 0, 0)->day ?: 7;
        $daysToShift--;
        $yearlyMap = gmp_init(0);
        for ($i = 1; $i < 52; $i++) {
            $yearlyMap = gmp_add($yearlyMap, $weeklyMap);
            $yearlyMap = gmp_shiftl($yearlyMap, Carbon::DAYS_PER_WEEK * BitwiseManipulator::INTERVALS_PER_DAY);
        }
        $yearlyMap = gmp_add($yearlyMap, gmp_shiftr($weeklyMap, $daysToShift * BitwiseManipulator::INTERVALS_PER_DAY));


        return new static($yearlyMap);
    }

    /**
     * @return \GMP|resource
     */
    public function GMPInstance()
    {
        return $this->binary;
    }
}