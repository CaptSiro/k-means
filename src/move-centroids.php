<?php

namespace KMean;

use Exception;



require_once __DIR__ . "/closest-point.php";
require_once __DIR__ . "/create-centroid.php";



/**
 * @throws Exception
 */
function move_centroids(array $points, array $centroids, int $size) {
    $map = [];

    $point_count = count($points);

    for ($i = 0; $i < $point_count; $i++) {
        $closest = closest_point($points[$i], $centroids, $size);

        if (isset($map[$closest])) {
            $map[$closest] = [$points[$i]];
            continue;
        }

        $map[$closest][] = $points[$i];
    }

    $new = [];
    $centroid_count = count($centroids);

    for ($i = 0; $i < $centroid_count; $i++) {
        if (!isset($map[$i])) {
            $new[$i] = $centroids[$i];
            continue;
        }

        $new[$i] = create_centroid($map[$i], $size);
    }

    return $new;
}