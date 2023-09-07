<?php

namespace KMean;

use Exception;

require_once __DIR__ . "/point-distance.php";



/**
 * @throws Exception
 */
function closest_point(array $point, array $points, int $size): int {
    $smallest = PHP_INT_MAX;
    $index = -1;
    $count = count($points);

    if (empty($points)) {
        throw new Exception("Can not get closest point if no points are provided.");
    }

    for ($i = 0; $i < $count; $i++) {
        $dist = point_distance($points[$i], $point, $size);

        if ($dist < $smallest) {
            $smallest = $dist;
            $index = $i;
        }
    }

    return $index;
}