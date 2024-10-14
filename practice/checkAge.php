<?php

require 'functions.php';

$terry = [
    'name' => 'Terry',
    'age' => 15
];

$Charlene = [
    'name' => 'Charlene',
    'age' => 21
];

if (ageCheck($terry['age'])) 
{
    echo 'Terry ';
    echo 'you may enter. ';
} 
else 
{
    echo 'Terry ';
    echo 'is not old enough for entry. ';
}

if (ageCheck($Charlene['age'])) 
{
    echo 'Charlene ';
    echo 'you may enter. ';
} 
else 
{
    echo 'Charlene ';
    echo 'is not old enough for entry. ';
}

require 'checkAge.view.php';