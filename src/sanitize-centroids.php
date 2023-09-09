<?php

namespace KMean;

require_once __DIR__ . "/Centroid.php";



const KEY_SEPARATOR = ";";



/**
 * @param Point[] $points
 * @param int $centroid_count
 * @return array|false
 */
function sanitize_centroids(array $points, int $centroid_count): array|false {
    $set = [];
    $set_size = 0;

    $count = count($points);
    for ($i = 0; $i < $count; $i++) {
        $key = join(KEY_SEPARATOR, $points[$i]->data());

        if (isset($set[$key])) {
            $set[$key][] = $points[$i];
            continue;
        }

        $set[$key] = [$points[$i]];
        $set_size++;

        if ($set_size > $centroid_count) {
            return false;
        }
    }

    $new = [];
    foreach ($set as $key => $connections) {
        $point = explode(KEY_SEPARATOR, $key);

        foreach ($point as $j => $str) {
            $point[$j] = intval($str);
        }

        $new[] = new Centroid($point, $connections);
    }

    return $new;
}