<?php



use KMean\Centroid;
use function KMean\kmeans;
use function KMean\point_distance;
use function sptf\functions\expect;
use function sptf\functions\fail;
use function sptf\functions\test;

require_once __DIR__ . "/../src/kmeans.php";



test("Should group points.json and return equivalent to result.json", function () {
    $points = json_decode(file_get_contents(__DIR__ . "/points.json"));

    foreach ($points as $i => $point) {
        $points[$i] = [$point->x, $point->y];
    }

    $centroids = [
        [0, 0],
        [0, 0]
    ];

    try {
        $groups = kmeans($points, $centroids, 2);
    } catch (Exception) {
        fail("Provided valid inputs, should not have failed");
        return;
    }

    usort($groups, function (Centroid $a, Centroid $b) { // ASC sort
        if ($a->connections === $b->connections) {
            return 0;
        }

        if ($a->connections < $b->connections) {
            return -1;
        }

        return 1;
    });

    $produced = [];
    foreach ($groups as $centroid) {
        $obj = new stdClass();
        $obj->x = round($centroid->point[0]);
        $obj->y = round($centroid->point[1]);

        $produced[] = $obj;
    }

    expect(json_encode($produced, JSON_PRETTY_PRINT))
        ->toBe(file_get_contents(__DIR__ . "/result.json"));
});



test("Correctly calculate distance from A to B", function () {
    $a = [55, 66, 58];
    $b = [98, 82, 36];

    expect(round(point_distance($a, $b, 3)))
        ->toBe(round(50.8822169328));
});