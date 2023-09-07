<?php

use function KMean\closest_point;
use function sptf\functions\fail;
use function sptf\functions\pass;
use function sptf\functions\test;

require_once __DIR__ . "/../src/closest-point.php";



test("Should throw when provided with empty points array", function () {
    try {
        closest_point([], [], 0);
    } catch (Exception) {
        pass();
        return;
    }

    fail("Should have thrown");
});