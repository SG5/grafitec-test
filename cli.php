#!/usr/bin/php
<?php

if (2 !== $argc) {
    die("Usage: {$argv[0]} 1,3,2,5,1".PHP_EOL);
}

$numbers = array_filter(explode(',', $argv[1]), 'is_numeric');

$isArithmetic = $isGeometric = true;
$lastNumber = $numbers[1];
$beforeLastNumber = $numbers[0];

foreach (array_slice($numbers, 2) as $number) {
    $isArithmetic = $isArithmetic && $lastNumber - $beforeLastNumber == $number - $lastNumber;
    $isGeometric = $isGeometric && $lastNumber / $beforeLastNumber == $number / $lastNumber;

    if (!$isArithmetic && !$isGeometric) {
        break;
    }

    $beforeLastNumber = $lastNumber;
    $lastNumber = $number;
}

if ($isArithmetic) {
    echo 'Arithmetic progression', PHP_EOL;
}
if ($isGeometric) {
    echo 'Geometric progression', PHP_EOL;
}
