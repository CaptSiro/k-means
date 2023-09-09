<?php

namespace KMean;



readonly class Centroid {
    /**
     * @param array $point
     * @param Point[] $connections
     */
    public function __construct(
        public array $point,
        public array $connections
    ) {}



    /**
     * @param Point[] $points
     * @param int $size
     * @return self
     */
    static function create(array $points, int $size): self {
        $centroid = [];

        for ($i = 0; $i < $size; $i++) {
            $centroid[$i] = 0;
        }

        $count = count($points);
        for ($i = 0; $i < $count; $i++) {
            $p = $points[$i]->data();

            for ($j = 0; $j < $size; $j++) {
                $centroid[$j] += $p[$j];
            }
        }

        for ($i = 0; $i < $size; $i++) {
            $centroid[$i] = $centroid[$i] / $count;
        }

        return new self($centroid, $points);
    }



    static function copy(Point|Centroid|array $centroid): Centroid {
        if ($centroid instanceof Centroid) {
            return $centroid;
        }

        if ($centroid instanceof Point) {
            return new self($centroid->data(), []);
        }

        return new self($centroid, []);
    }
}