<?php

namespace KMean;

use Exception;



require_once __DIR__ . "/move-centroids.php";
require_once __DIR__ . "/point-distance.php";
require_once __DIR__ . "/Point.php";
require_once __DIR__ . "/sanitize-centroids.php";



/**
 * @param Point[] $points
 * @param Point[] $centroids
 * @param int $point_dimensions
 * @param float $threshold
 * @return Centroid[]
 * @throws Exception
 */
function kmeans(array $points, array $centroids, int $point_dimensions, float $threshold = 0.01): array {
    $centroid_count = count($centroids);
    $result = sanitize_centroids($points, $centroid_count);

    if ($result !== false) {
        return $result;
    }

    /** @var Centroid[] $centroid_objects */
    $centroid_objects = [];

    for ($j = 0; $j < $centroid_count; $j++) {
        $centroid_objects[] = new Centroid($centroids[$j]->data(), []);
    }

    do {
        $dist = 0;
        $moved = move_centroids($points, $centroid_objects, $point_dimensions);

        for ($i = 0; $i < $centroid_count; $i++) {
            $dist += point_distance($centroid_objects[$i]->point, $moved[$i]->point, $point_dimensions);
        }

        $centroid_objects = $moved;
    } while ($dist / $centroid_count > $threshold);

    return $centroid_objects;
}