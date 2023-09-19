<?php

$x = 5;

function myTest1()
{
    global $x;
    $x = 3;
    return $x;
}
function myTest2()
{
    static $x = "viis";
    $GLOBALS['x'] = 9;
    echo $x;
    $x++;
}
echo myTest2();
echo myTest1();
echo $x;
echo myTest2();