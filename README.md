# k-means

[Absol package](https://github.com/CaptSiro/absol) for performing k-means algorithm

## Installation

```shell
absol pickup https://github.com/CaptSiro/k-means.git
```

## Usage

For your data classes you need to implement `\KMean\Point`.
The array returned from `data()` must have fixed size.
That means you cannot return from one object array of length two and from other one array of length three.
Example of `Color` data class:

```php
readonly class Color implements \KMean\Point {
    private array $internal;
    
    public function __construct(
        public int $r,
        public int $g,
        public int $b,
    ) {
        $this->internal = [$r, $g, $b]; // always length of 3
    }
    
    public function data() : array{
        return $this->internal;
    }
}
```

After implementing `\KMean\Point` interface the `kmeans` function can be called.
The function will return an array of `Centroid` objects.

### IMPORTANT: `kmeans` function can return fewer centroids then was given. Example of monochrome image and trying to get more two colors from it

```php
$points = [
    new Color(35, 1, 16),
    new Color(13, 12, 15),
    new Color(196, 196, 196),
    new Color(6, 28, 168),
    new Color(25, 43, 43),
    new Color(114, 168, 120),
    new Color(166, 170, 128),
    new Color(112, 178, 117)
];

$centroids = [
    new Color(0, 0, 0),
    new Color(0, 0, 0),
];

$point_dimensions = 3; // using three channels to describe color

$computed = \KMean\kmeans($points, $centroids, $point_dimensions); // returns array of Centroid objects

// Centroid->point muted array from provided point->data()
// Centroid->connections array of points to which centroid connects to
```
