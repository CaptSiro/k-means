<?php

use function sptf\functions\test_directory;

require_once __DIR__ . "/absol/import.php";

import("sptf", "dir");



test_directory(__DIR__ . "/tests");