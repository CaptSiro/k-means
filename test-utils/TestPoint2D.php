<?php



namespace TestUtils;

use KMean\Point;

readonly class TestPoint2D implements Point {
    private array $buffer;



    public function __construct(
        public float $x,
        public float $y
    ) {
        $this->buffer = [$x, $y];
    }



    function data(): array {
        return $this->buffer;
    }
}