<?php

namespace KMean;



function point_distance(array $from, array $to, int $size): float {
    $sum = 0;

    for ($i = 0; $i < $size; $i++) {
        $sum += pow($from[$i] - $to[$i], 2);
    }

    return sqrt($sum);
}