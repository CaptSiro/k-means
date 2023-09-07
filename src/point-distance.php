<?php

namespace KMean;



function point_distance(Centroid|array $from, array $to, int $size): float {
    $sum = 0;

    if ($from instanceof Centroid) {
        for ($i = 0; $i < $size; $i++) {
            $sum += pow($from->point[$i] - $to[$i], 2);
        }
    } else {
        for ($i = 0; $i < $size; $i++) {
            $sum += pow($from[$i] - $to[$i], 2);
        }
    }

    return sqrt($sum);
}