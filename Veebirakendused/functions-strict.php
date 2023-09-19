<?php declare(strict_types=1);

function addNumbers(int $a, int $c,int $b=7) : int {
    return $a + $b + $c;
}
function testTagastuseta() : int {
    echo "Echo Ei tagasta midagi"; // echo ei tagasta midagi
    return print "Print tagastab midagi"; // print ise tagastab täisarvu
}
echo addNumbers(5, 6, 8)."<br>";
echo addNumbers(3, 9);
testTagastuseta();
echo "<br>";
$number = 5;
// Viiteta parameeter
function noRef(int $number) {
    $number*=$number;
    echo "$number in noRef<br>";
}
// Viitega parameeter
function hasRef(int &$refToNumber) {
    $refToNumber*=$refToNumber;
    echo "$refToNumber in hasRef<br>";
}
noRef($number);
echo "$number after noRef<br>";
hasRef($number);
echo "$number after hasRef<br>";

