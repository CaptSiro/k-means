<?php

namespace KMean;



readonly class Centroid {
    public function __construct(
        public array $point,
        public int $connections
    ) {}



    static function create(array $points, int $size): self {
        $centroid = [];

        for ($i = 0; $i < $size; $i++) {
            $centroid[$i] = 0;
        }

        $count = count($points);
        for ($i = 0; $i < $count; $i++) {
            $p = $points[$i];

            for ($j = 0; $j < $size; $j++) {
                $centroid[$j] += $p[$j];
            }
        }

        for ($i = 0; $i < $size; $i++) {
            $centroid[$i] = $centroid[$i] / $count;
        }

        return new self($centroid, $count);
    }



    static function copy(Centroid|array $centroid): Centroid {
        if ($centroid instanceof Centroid) {
            return $centroid;
        }

        return new self($centroid, 0);
    }
}