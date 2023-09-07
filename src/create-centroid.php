<?php

namespace KMean;



function create_centroid(array $points, int $size): array {
    $centroid = [];

    for ($i = 0; $i < $size; $i++) {
        $centroid[$i] = 0;
    }

    $count = count($points);
    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $size; $j++) {
            $centroid[$j] += $points[$i][$j];
        }
    }

    for ($i = 0; $i < $size; $i++) {
        $centroid[$i] /= $count;
    }

    return $centroid;
}