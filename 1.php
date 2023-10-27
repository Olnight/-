<?php

function makePoint($x, $y) {
    $r = sqrt($x**2 + $y**2);
    $theta = atan2($y, $x);
    return ['r' => $r, 'theta' => $theta];
}

function getX($point) {
    return $point['r'] * cos($point['theta']);
}

function getY($point) {
    return $point['r'] * sin($point['theta']);
}

function makeSegment($point1, $point2) {
    return ['beginPoint' => $point1, 'endPoint' => $point2];
}

function getBeginPoint($segment) {
    return $segment['beginPoint'];
}

function getEndPoint($segment) {
    return $segment['endPoint'];
}

function isParallelWithX($segment) {
    $beginPoint = getBeginPoint($segment);
    $endPoint = getEndPoint($segment);
    return getY($beginPoint) === getY($endPoint);
}

function isParallelWithY($segment) {
    $beginPoint = getBeginPoint($segment);
    $endPoint = getEndPoint($segment);
    return getX($beginPoint) === getX($endPoint);
}

// Проверка результата
$point1 = makePoint(3, 2);
$point2 = makePoint(0, 0);
$point3 = makePoint(3, -5);
$point4 = makePoint(0, -5);
echo isParallelWithY(makeSegment($point1, $point2)) ? "true" : "false";
echo "<br>";
echo isParallelWithY(makeSegment($point1, $point3)) ? "true" : "false";
echo "<br>";
echo isParallelWithX(makeSegment($point2, $point3)) ? "true" : "false";
echo "<br>";
echo isParallelWithX(makeSegment($point3, $point4)) ? "true" : "false";

?>




<?php

function calculateDistance($point1, $point2) {
    $x_diff = $point2[0] - $point1[0];
    $y_diff = $point2[1] - $point1[1];
    
    return sqrt($x_diff * $x_diff + $y_diff * $y_diff);
}

$point1 = [0, 0];
$point2 = [3, 4];
print calculateDistance($point1, $point2);
print "<br>";

$point3 = [-1, -4];
$point4 = [-1, -10];
print calculateDistance($point3, $point4);
print "<br>";

$point3 = [1, 10];
$point4 = [1, 3];
print calculateDistance($point3, $point4);

?>
