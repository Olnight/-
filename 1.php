
function makeDecartPoint($x, $y) {
    return [
        'x' => $x,
        'y' => $y
    ];
}

function getX($point) {
    return $point['x'];
}

function getY($point) {
    return $point['y'];
}

function getQuadrant($point) {
    $x = getX($point);
    $y = getY($point);

    if ($x > 0 && $y > 0) {
        return 1;
    } elseif ($x < 0 && $y > 0) {
        return 2;
    } elseif ($x < 0 && $y < 0) {
        return 3;
    } elseif ($x > 0 && $y < 0) {
        return 4;
    }

    return null;
}

function makeRectangle($startPoint, $width, $height) {
    return [
        'startPoint' => $startPoint,
        'width' => $width,
        'height' => $height
    ];
}

function getStartPoint($rectangle) {
    return $rectangle['startPoint'];
}

function getWidth($rectangle) {
    return $rectangle['width'];
}

function getHeight($rectangle) {
    return $rectangle['height'];
}

function containsOrigin($rectangle) {
    $leftTop = getStartPoint($rectangle);
    $rightTop = makeDecartPoint(getX($leftTop) + getWidth($rectangle), getY($leftTop));
    $leftBottom = makeDecartPoint(getX($leftTop), getY($leftTop) - getHeight($rectangle));
    $rightBottom = makeDecartPoint(getX($leftTop) + getWidth($rectangle), getY($leftTop) - getHeight($rectangle));
    
    $quadrants = [
        getQuadrant($leftTop),
        getQuadrant($rightTop),
        getQuadrant($leftBottom),
        getQuadrant($rightBottom)
    ];
    
    sort($quadrants);
    
    return $quadrants == [1, 2, 3, 4];
}

// Тестирование

$p = makeDecartPoint(0, 1);
$rectangle = makeRectangle($p, 4, 5);
print_r(getStartPoint($rectangle));
print "<br>";
print getWidth($rectangle);
print "<br>";
print getHeight($rectangle);
print "<br>";

$p2 = makeDecartPoint(-4, 3);
$rectangle2 = makeRectangle($p2, 5, 4);
print_r(getStartPoint($rectangle2));
print "<br>";
print getWidth($rectangle2);
print "<br>";
print getHeight($rectangle2);
print "<br>";

print(containsOrigin($rectangle)?"true":"false");
print "<br>";

print(containsOrigin($rectangle2)?"true":"false");
print "<br>";

$rectangle3 = makeRectangle($p2, 2, 2);
print(containsOrigin($rectangle3)?"true":"false");
print "<br>";

$rectangle4 = makeRectangle($p2, 5, 2);
print(containsOrigin($rectangle4)?"true":"false");
print "<br>";

$rectangle5 = makeRectangle($p2, 2, 4);
print(containsOrigin($rectangle5)?"true":"false");
print "<br>";

$rectangle6 = makeRectangle($p2, 4, 3);
print(containsOrigin($rectangle6)?"true":"false");



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
