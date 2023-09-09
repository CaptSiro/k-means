<?php

namespace KMean;

const KMEAN_SORT_ASC = 1;
const KMEAN_SORT_DESC = -1;



/**
 * Descending sorting for Centroid array
 * @param Centroid[] $centroids
 * @param int $direction
 * @return void
 */
function kmeans_sort(array &$centroids, int $direction = KMEAN_SORT_ASC): void {
    usort($centroids, function (Centroid $a, Centroid $b) use ($direction) {
        $ac = count($a->connections);
        $bc = count($b->connections);

        if ($ac === $bc) {
            return 0;
        }

        if ($ac < $bc) {
            return -1 * $direction;
        }

        return $direction;
    });
}