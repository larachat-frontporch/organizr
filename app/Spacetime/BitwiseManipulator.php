<?php

namespace App\Spacetime;


class BitwiseManipulator
{
    /**
     * Convert a short binary into a long representation.
     *
     * @param  $shorthand  A shorter representation of a binary string.
     * @param  int  $repeat  The number of times every bit should be repeated.
     * @param  bool  $array  Whether an array or string of bits is passed in.
     * @return string
     */
    public static function generateExpandedBinary($shorthand, $repeat = 4, $array = true)
    {
        if (! $array) {
            $shorthand = str_split($shorthand);
        }

        // This will convert a simple binary string such as 0101 to a string
        // where the bits are being repeated over the requested number of
        // times. This will turn 0101 into 0000111100001111 by default.
        return implode('', array_map(function ($bit) use ($repeat) {
            return str_repeat($bit, $repeat);
        }, $shorthand));
    }
}