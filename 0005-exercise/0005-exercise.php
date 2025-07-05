<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$a = 4;
$b = "5";
try {
    echo "1. " . ($a+$b) . "<br>";
} catch (TypeError $error) {
    echo "2. " . $error->getMessage() . "<br>";
}

$a = 5;
$b = 4;
$c = "1";
try {
    echo "2. " . ($a+$b+$c) . "<br>";
} catch (TypeError $error) {
    echo "3. " . $error->getMessage() . "<br>";
}

$a = "2";
$b = 4;
$c = "a";
try {
    echo "3. " . ($a+$b+$c) . "<br>";
} catch (TypeError $error) {
    echo "4. " . $error->getMessage() . "<br>";
}

$a = 3;
$b = 2;
$c = $a;
try {
    echo "4. " . ($a+$b+$c) . "<br>";
} catch (TypeError $error) {
    echo "5. " . $error->getMessage() . "<br>";
}

$a = 3;
$b = '2';
$c = $a;
try {
    echo "5. " . ($a+$b+$c) . "<br>";
} catch (TypeError $error) {
    echo "6. " . $error->getMessage() . "<br>";
}

$a = 3;
$b = "2";
$c = $a+1;
try {
    echo "6. " . ($a+$b+$c) . "<br>";
} catch (TypeError $error) {
    echo "7. " . $error->getMessage() . "<br>";
}

?>