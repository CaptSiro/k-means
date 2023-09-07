# k-means

[Absol package](https://github.com/CaptSiro/absol) for performing k-means algorithm

## Installation

```shell
absol pickup https://github.com/CaptSiro/sptf.git
```

## Usage

You need to convert your data in arrays. These arrays can have any length, but all points and centroids must be the
same length. The length of the array will be passed as a `point_dimensions` argument. Example of converting `Color` to data array:

```php
readonly class Color {
    public function __construct(
        public int $r,
        public int $g,
        public int $b,
    ) {}
}

$color = new Color(255, 255, 255);
$data_array = [$color->r, $color->g, $color->b];
```

After conversion the `kmeans` function can be called. The function will return an array of `Centroid` objects.

```php
$points = [
    [10, 44],
    [69, 70],
    [420, 103],
    [727, 53]
];

$centroids = [
    [0, 0],
    [0, 0]
];

$point_dimensions = 2; // using two numbers to express points position

$computed = \KMean\kmeans($points, $centroids, $point_dimensions);
```