<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$op1 = 10;
$op2 = 3;

// +=
echo "<strong>Valor inicial:</strong> \$op1 = $op1, \$op2 = $op2<br><br>";
$op1 += $op2;
echo "\$op1 += \$op2 => $op1<br>";

// -=
$op1 = 10;
$op1 -= $op2; // op1 = 10 - 3 = 7
echo "\$op1 -= \$op2 => $op1<br>";

// *=
$op1 = 10;
$op1 *= $op2; // op1 = 10 * 3 = 30
echo "\$op1 *= \$op2 => $op1<br>";

// /=
$op1 = 10;
$op1 /= $op2; // op1 = 10 / 3 ≈ 3.333...
echo "\$op1 /= \$op2 => $op1<br>";

// %=
$op1 = 10;
$op1 %= $op2; // op1 = 10 % 3 = 1
echo "\$op1 %= \$op2 => $op1<br>";
?>
