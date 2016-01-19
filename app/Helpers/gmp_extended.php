<?php

if (! function_exists('gmp_shiftl')) {
    function gmp_shiftl($x,$n) { // shift left
        return(gmp_mul($x,gmp_pow(2,$n)));
    }
}

if (! function_exists('gmp_shiftr')) {
    function gmp_shiftr($x,$n) { // shift right
        return(gmp_div($x,gmp_pow(2,$n)));
    }
}
