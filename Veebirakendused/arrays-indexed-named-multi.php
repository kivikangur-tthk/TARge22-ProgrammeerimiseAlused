<?php
// Indexed arrays
$cars = array("Volvo","Saab","Köenigsegg");
$cars2 = ["VW","Audi","Seat","BMW"];
$cars3[] = "Lada";
$cars3[] = "Moskvitch";
$cars3[] = "Niva";
$cars[5] = "Scania";
$cars[] = "Polestar";
var_dump($cars);
echo "<br>";
var_dump($cars2);
echo "<br>";
var_dump($cars3);
// Associative array
$ages = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Peter is " . $ages['Peter'] . " years old.<br><br>";
$ages["Peter"] = 37;
$ages["Alice"] = 19;
foreach ($ages as $name => $age) {
    echo "$name is $age years old.<br>";
}
// Multidimensional array
$cars = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
  );
$cars2 = [["VW",22,13],["Audi",3],"Seat","BMW"];
?><pre><?php
var_dump($cars);
var_dump($cars2);
?></pre><?php

echo "Saabi laosesi on ".$cars[2][1];