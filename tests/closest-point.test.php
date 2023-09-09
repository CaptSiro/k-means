<?php

use TestUtils\TestPoint2D;
use function KMean\closest_centroid;
use function sptf\functions\fail;
use function sptf\functions\pass;
use function sptf\functions\test;

require_once __DIR__ . "/../src/kmeans.php";
require_once __DIR__ . "/../test-utils/TestPoint2D.php";



test("Should throw when provided with empty points array", function () {
    try {
        closest_centroid(new TestPoint2D(0, 0), [], 0);
    } catch (Exception) {
        pass();
        return;
    }

    fail("Should have thrown");
});