<?php

require 'functions.php';

$result = [];

for ($number = 1; $number <= 100; $number++) {
    $results[] = fizzBuzz($number);
}

require 'fizzbuzz.view.php';