<?php

namespace KMean;

use Exception;



require_once __DIR__ . "/move-centroids.php";
require_once __DIR__ . "/point-distance.php";



/**
 * @throws Exception
 */
function kmean(array $points, array $centroids, int $point_dimensions, float $threshold = 0.001): array {
    $dist = 0;
    $centroid_count = count($centroids);

    do {
        $moved = move_centroids($points, $centroids, $point_dimensions);

        for ($i = 0; $i < $centroid_count; $i++) {
            $dist += point_distance($moved[$i], $centroids[$i], $point_dimensions);
        }

        $centroids = $moved;
    } while ($dist / $centroid_count < $threshold);

    return $centroids;
}