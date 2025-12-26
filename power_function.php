<?php
// Student ID: 2135XXXX
// Name: Rayan [Your Last Name]
// CPIT-405 Lab 10 - Assessment 1

echo "<h2>Power Function - Recursive vs Iterative</h2>";

// Recursive Implementation
function powerRecursive($base, $exponent) {
    if ($exponent == 0) {
        return 1;
    }
    if ($exponent < 0) {
        return 1 / powerRecursive($base, -$exponent);
    }
    return $base * powerRecursive($base, $exponent - 1);
}

// Iterative Implementation
function powerIterative($base, $exponent) {
    $result = 1;
    $isNegative = $exponent < 0;
    $exponent = abs($exponent);
    
    for ($i = 0; $i < $exponent; $i++) {
        $result *= $base;
    }
    
    return $isNegative ? 1 / $result : $result;
}

// Testing
echo "<h3>Recursive Function Tests:</h3>";
echo "2^3 = " . powerRecursive(2, 3) . "<br>";
echo "5^4 = " . powerRecursive(5, 4) . "<br>";
echo "3^0 = " . powerRecursive(3, 0) . "<br>";
echo "2^-2 = " . powerRecursive(2, -2) . "<br>";

echo "<h3>Iterative Function Tests:</h3>";
echo "2^3 = " . powerIterative(2, 3) . "<br>";
echo "5^4 = " . powerIterative(5, 4) . "<br>";
echo "3^0 = " . powerIterative(3, 0) . "<br>";
echo "2^-2 = " . powerIterative(2, -2) . "<br>";
?>