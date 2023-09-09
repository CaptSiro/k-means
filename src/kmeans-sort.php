<?php

namespace KMean;



/**
 * Ascending sorting for Centroid array
 * @param Centroid[] $centroids
 * @return void
 */
function kmeans_sort(array &$centroids): void {
    usort($centroids, function (Centroid $a, Centroid $b) {
        $ac = count($a->connections);
        $bc = count($b->connections);

        if ($ac === $bc) {
            return 0;
        }

        if ($ac < $bc) {
            return -1;
        }

        return 1;
    });
}