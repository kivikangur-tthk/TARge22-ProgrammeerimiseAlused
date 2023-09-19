<h1>Tervitused</h1>

<?php

echo "WHILE<br>";
$counter = 1;
while ($counter <= 5) {
    echo "Tere $counter. matkaja<br>";
    $counter++;
}

echo "DO WHILE<br>";
$counter = 1;
do {
    echo "Tere $counter. matkaja<br>";
    $counter++;
} while ($counter <= 5);

echo "FOR<br>";
for ($counter = 1; $counter <= 5; $counter++) {
    echo "Tere $counter. matkaja<br>";
}

echo "FOREACH<br>";
$numbers = [1,2,3,4,5]; // range(1,5);
foreach ($numbers as $counter) {
    echo "Tere $counter. matkaja<br>";
}

echo "FOREACH with index<br>";
$numbers = [1,2,3,4,5]; // range(1,5);
foreach ($numbers as $index => $counter) {
    echo "$index Tere $counter. matkaja<br>";
}

echo "Fizz Buzz FizzBuzz<br>";

for ($i=1; $i <= 250; $i++) {
    $result;
    if ($i % 3 == 0 && $i % 5 == 0) {
        $result = "FizzBuzz";
    } else if ($i % 3 == 0) {
        $result = "Fizz";
    } else if ($i % 5 == 0) {
        $result = "Buzz";
    } else {
        $result = "$i";
    }
    if ($i % 16 == 0) $result .= "<br>";
    echo "$result ";
}