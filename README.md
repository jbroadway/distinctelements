# Distinct Elements in Streams

A pure PHP implementation of the Distinct Elements in Streams algorithm for estimating
the number of distinct elements in a set, from the following paper:

https://arxiv.org/abs/2301.10191

Usage:

```php
<?php
	
use distinctelements\DistinctElements;

$stream = [1, 2, 3, 4, 1, 2, 3, 4, 5, 4, 3, 1, 2];
$epsilon = 0.1;
$delta = 0.1;

$output = DistinctElements::streaming_algorithm ($stream, $epsilon, $delta);
var_dump ($output);
```
