<?php


$i = imageCreate(500, 300);

imageAntiAlias($i, true);

$red = imageColorAllocate($i, 255, 0, 0);
$white = imageColorAllocate($i, 0xFF, 0xFF, 0xFF);
$black = imageColorAllocate($i, 0, 0, 0);
$green = imageColorAllocate($i, 0, 255, 0);
$blue = imageColorAllocate($i, 0, 0, 255);
$grey = imageColorAllocate($i, 192, 192, 192);

imageFill($i, 0, 0, $grey);

imageSetPixel($i, 10, 10, $black);

imageLine($i, 20, 20, 80, 280, $red);

imagefilledrectangle($i, 20, 20, 80, 280, $blue);



$points = array(0, 0, 100, 200, 300, 200);

imagefilledpolygon($i, $points, 3, $green);

imageEllipse($i, 200, 150, 300, 200, $red);

imageFilledArc($i, 200, 150, 300, 200, 60, 10, $black);


//imageFilledArc($i, 200, 150, 300, 200, 0, 40, $red, IMG_ARC_PIE);

header("Content-type: image/gif");
imageGif($i);

