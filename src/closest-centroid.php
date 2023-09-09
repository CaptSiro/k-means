<?php

namespace KMean;

use Exception;

require_once __DIR__ . "/point-distance.php";



/**
 * @param Point $point
 * @param Centroid[] $centroids
 * @param int $size
 * @return int
 * @throws Exception
 */
function closest_centroid(Point $point, array $centroids, int $size): int {
    $smallest = PHP_INT_MAX;
    $index = -1;
    $count = count($centroids);

    if (empty($centroids)) {
        throw new Exception("Can not get closest point if no points are provided.");
    }

    for ($i = 0; $i < $count; $i++) {
        $dist = point_distance($point->data(), $centroids[$i]->point, $size);

        if ($dist < $smallest) {
            $smallest = $dist;
            $index = $i;
        }
    }

    return $index;
}