<?php

// Функции для работы с точками:
function makeDecartPoint($x, $y)
{
    return [
        'x' => $x,
        'y' => $y
    ];
}

function getX($point)
{
    return $point['x'];
}

function getY($point)
{
    return $point['y'];
}

// Функции для работы с отрезками:

function makeSegment($beginPoint, $endPoint)
{
    return [
        'beginPoint' => $beginPoint,
        'endPoint' => $endPoint
    ];
}

function getBeginPoint($segment)
{
    return $segment['beginPoint'];
}

function getEndPoint($segment)
{
    return $segment['endPoint'];
}

function getMidpointOfSegment($segment)
{
    $begin = getBeginPoint($segment);
    $end = getEndPoint($segment);

    $x_mid = (getX($begin) + getX($end)) / 2;
    $y_mid = (getY($begin) + getY($end)) / 2;

    return makeDecartPoint($x_mid, $y_mid);
}

// Проверка работы функций:

$beginPoint = makeDecartPoint(3, 2);
$endPoint = makeDecartPoint(0, 0);
$segment = makeSegment($beginPoint, $endPoint);
print_r(getBeginPoint($segment));
print "<br>";

print_r(getEndPoint($segment));
print "<br>";

$segment = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(0, 0));
print_r(getMidpointOfSegment($segment));
print "<br>";

$segment2 = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(2, 3));
print_r(getMidpointOfSegment($segment2));

?>