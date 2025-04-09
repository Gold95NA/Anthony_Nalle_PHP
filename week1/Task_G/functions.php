<?php

function fizzbuzz($num) {

    if ($num % 2 === 0 && $num % 3 === 0) {

        return "Fizz Buzz";

    } elseif ($num % 2 === 0) {

        return "Fizz";

    } elseif ($num % 3 === 0) {

        return "Buzz";

    } else {

        return $num;
        
    }

}