<?php

$h = 24; // date("i");

switch ($h) {
    case '24':
    case '12':
        echo "1/5 tund";
        break;
    default:
        echo "Mingi minut ikka on";
        break;
}