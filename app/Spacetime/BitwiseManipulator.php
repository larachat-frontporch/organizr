<?php

namespace App\Spacetime;


class BitwiseManipulator
{
    /**
     * Convert a short binary into a long representation.
     *
     * @param  string $shorthand  A shorter representation of a binary string.
     * @param  int  $repeat  The number of times every bit should be repeated.
     * @return string
     */
    public static function generateExpandedBinary($shorthand, $repeat = 4)
    {
        if (! is_array($shorthand)) {
            $shorthand = str_split($shorthand);
        }

        // This will convert a simple binary string such as 0101 to a string
        // where the bits are being repeated over the requested number of
        // times. This will turn 0101 into 0000111100001111 by default.
        return implode('', array_map(function ($bit) use ($repeat) {
            return str_repeat($bit, $repeat);
        }, $shorthand));
    }

    public static function createBinaryFromString($binaryString)
    {
        return gmp_init($binaryString, 2);
    }
}