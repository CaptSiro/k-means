<?php

namespace KMean;

use Exception;



require_once __DIR__ . "/closest-point.php";
require_once __DIR__ . "/Centroid.php";



/**
 * @return Centroid[]
 * @throws Exception
 */
function move_centroids(array $points, array $centroids, int $size): array {
    $map = [];

    $point_count = count($points);

    for ($i = 0; $i < $point_count; $i++) {
        $closest = closest_point($points[$i], $centroids, $size);

        if (!isset($map[$closest])) {
            $map[$closest] = [$points[$i]];
            continue;
        }

        $map[$closest][] = $points[$i];
    }

    $new = [];
    $centroid_count = count($centroids);

    for ($i = 0; $i < $centroid_count; $i++) {
        if (!isset($map[$i])) {
            $new[$i] = Centroid::copy($centroids[$i]);
            continue;
        }

        $new[$i] = Centroid::create($map[$i], $size);
    }

    return $new;
}