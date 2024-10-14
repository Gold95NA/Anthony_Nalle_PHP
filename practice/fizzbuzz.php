<?php

//function to determine the fizz buzz result

function fizzBuzz($number) 
{
    if ($number % 2 == 0 && $number % 3 == 0) 
    {
        return "fizz buzz";
    } 
    elseif ($number % 2 == 0) 
    {
        return "fizz";
    } 
    elseif ($number % 3 == 0) 
    {
        return "buzz";
    } 
    else 
    {
        return $number;
    }
}

//display numbers 1 through 100

for ($i = 1; $i <= 100; $i++) 
{
    echo fizzBuzz($i) . "<br>";
}

?>