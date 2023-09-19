<?php
$h = 30; //date("i");
echo $h . "<br>";
if ($h < 10) {
    echo "Tunni algus";
} else if ($h < 30) {
    echo "Tunni esimene pool";
} else if ($h > 50) {
    echo "Tunni lõpp";
} else {
    echo "Tunni teine pool";
}